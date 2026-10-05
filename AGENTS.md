# AGENTS.md

## Project
AWQAF Corporate Website is a live corporate, governance and AGM service. Treat production content, member-facing forms and administration functions as operationally sensitive.

## Architecture
- Backend: Laravel 13 / PHP.
- Frontend: Inertia + Vue 3 + Vite.
- Data: PostgreSQL.
- Admin: Filament.
- Production hosting: Render.
- Production domain: `https://awqaf.my`.
- Built-in Laravel health route: `GET /up`.

Do not assume this project uses Next.js or Vercel just because generic deployment guidance mentions them.

## Agent working rules
1. Inspect current routes, controllers, Vue pages, migrations and deployment configuration before editing.
2. Make the smallest safe change and preserve existing corporate content/SEO unless the task explicitly changes it.
3. Never expose `.env` values, credentials, private keys or admin secrets.
4. Treat AGM RSVP data and identity-card numbers as sensitive personal data. Do not log, expose or duplicate full IC numbers outside the authorised admin workflow.
5. Preserve authentication and Filament admin boundaries.
6. Keep public pages responsive and mobile-first. Navigation, AGM popup/RSVP, downloads and core CTAs must remain usable on small screens.
7. Database/schema changes require migrations; avoid destructive changes without an explicit migration and data-impact review.
8. Do not replace current hosting architecture with Vercel/another platform unless explicitly requested.
9. Do not declare completion until build/tests and the affected user journey have been verified.

## Local/build validation
Typical validation sequence:

```bash
composer install --no-interaction
cp .env.example .env   # only for a fresh local/test environment
php artisan key:generate
npm ci
npm run build
php artisan test
```

Use the existing environment when already configured; do not overwrite a real `.env`.

For route/UI changes, also verify the relevant page manually at desktop and mobile breakpoints.

## Critical production paths
At minimum consider:
- `/`
- `/up`
- `/agm` while AGM is active
- `/hubungi`
- public AGM documents
- AGM RSVP submission and confirmation
- Filament admin login/data access when admin functionality is touched

## Health and operations
- Laravel's built-in liveness endpoint is already configured at `GET /up`.
- Keep it fast and side-effect free.
- Production smoke checks live in `.github/workflows/production-smoke.yml`.
- A failed smoke check is an operations/release signal and should be investigated before declaring the release healthy.

## NSDF release gate
For material changes follow:
requirements -> architecture/impact -> security/data review -> build/change -> automated validation -> independent review -> release -> production verification/monitoring.

Prefer pull requests for changes affecting authentication, personal data, AGM workflows, database schema, deployment or other high-impact production behaviour.
