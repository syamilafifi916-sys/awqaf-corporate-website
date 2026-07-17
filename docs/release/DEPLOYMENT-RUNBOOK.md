# AWQAF Corporate Website — Deployment Runbook & Rollback Plan

Stack: Laravel + Inertia/Vue 3 + Tailwind, PostgreSQL, built assets via Vite.
Public brochure site. Uploaded content (annual-report PDFs) lives in
`storage/app/public`, **not** in git. Member data is in the separate Member
Portal (ADR-001) — out of scope here.

> Status: this runbook is written and ready. It has **not** been executed —
> no production host/DNS/secrets exist yet (M9 Deployment is blocked). Values in
> ALL_CAPS are provisioned at deploy time.

---

## 0. Pre-deploy gate (must all be green)
- [ ] `git status` clean; deploying a tagged release commit.
- [ ] CI green (`.github/workflows/ci.yml`) — set the org/remote first.
- [ ] `.env` on server has: `APP_ENV=production`, `APP_DEBUG=false`,
      `APP_URL=https://<domain>`, `APP_KEY` set, DB/cache/queue/mail configured.
- [ ] TLS certificate valid; HSTS already emitted by `SecurityHeaders` middleware.
- [ ] Backup taken (`./ops/backup.sh prod <dir>`) and its restore verified once.
- [ ] `SENTRY_LARAVEL_DSN` set (error monitoring) and an uptime monitor configured.

## 1. Deploy procedure
```bash
# 1. Fetch the release
git fetch --all --tags && git checkout <release-tag>

# 2. PHP deps (no dev)
composer install --no-dev --optimize-autoloader

# 3. Frontend build
npm ci && npm run build

# 4. Config/route/view caches (production)
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 5. Migrations (corporate DB is small: Reports + audit tables)
php artisan migrate --force

# 6. Storage symlink (serves uploaded report PDFs)
php artisan storage:link

# 7. Warm + verify
php artisan optimize
curl -sI https://<domain>/ | head -1        # expect 200
curl -s https://<domain>/sitemap.xml | grep -c '<loc>'   # expect 21
```

## 2. Post-deploy smoke test (2 min)
- [ ] `/` returns 200; hero renders; homepage shows the policy-neutral model (no ratio).
- [ ] `/portfolio`, `/program`, `/korporat/lembaga-pengarah`, `/korporat/pengasas` all 200.
- [ ] `/korporat/laporan-tahunan` — a report PDF downloads (storage symlink OK).
- [ ] `/sitemap.xml`, `/robots.txt` 200; canonical + OG present in `<head>`.
- [ ] A random 404 returns HTTP 404.
- [ ] Sentry receives a test event; uptime monitor shows green.

## 3. Scheduler / queues
Corporate site defines **no scheduled tasks** and no queued jobs (brochure site).
If backups are cron-driven, schedule `ops/backup.sh prod` at the host/cron level
(daily) — it is **not** wired into Laravel's scheduler.

---

## Rollback plan

**Trigger:** homepage/critical route returns 5xx, broken asset/hero, failed
migration, or Sentry error spike after deploy.

### Fast rollback (no schema change) — target < 5 min
```bash
git checkout <previous-release-tag>
composer install --no-dev --optimize-autoloader
npm ci && npm run build
php artisan config:cache route:cache view:cache
php artisan optimize
```
Re-run the §2 smoke test. Because assets are content-hashed by Vite, reverting
the code reverts the served assets; no CDN purge needed unless a CDN caches HTML.

### Rollback with a migration to undo
```bash
php artisan migrate:rollback --step=1 --force   # only if the bad deploy migrated
# then perform the Fast rollback above
```
If data integrity is in doubt, restore the pre-deploy DB dump:
```bash
gunzip -c corporate-db-<stamp>.sql.gz | psql "$CORPORATE_DATABASE_URL"
```
Restore uploaded files (report PDFs) from the same backup set if they changed.
Full restore procedure: `awqaf-platform-docs/ops/backup-restore.md`.

### After any rollback
- [ ] Confirm §2 smoke test green.
- [ ] Note the incident (what/when/why) and the failing commit.
- [ ] Do not re-deploy until the root cause is fixed and CI is green.
