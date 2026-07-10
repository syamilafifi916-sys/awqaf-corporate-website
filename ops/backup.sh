#!/usr/bin/env bash
# AWQAF corporate website — database + uploaded-files backup.
#
# Dev (Sail):   ./ops/backup.sh dev /path/to/backup/dir
# Production:   ./ops/backup.sh prod /path/to/backup/dir
#
# Includes storage/app/public (annual report PDFs are uploaded content,
# not committed to git). Restore procedure:
# awqaf-platform-docs/ops/backup-restore.md

set -euo pipefail

MODE="${1:?usage: backup.sh dev|prod <backup-dir>}"
DEST="${2:?usage: backup.sh dev|prod <backup-dir>}"
STAMP="$(date +%Y%m%d-%H%M%S)"

mkdir -p "$DEST"

if [ "$MODE" = "dev" ]; then
    docker exec awqaf-holdings-website-pgsql-1 pg_dump -U sail laravel > "$DEST/corporate-db-$STAMP.sql"
else
    pg_dump "$CORPORATE_DATABASE_URL" > "$DEST/corporate-db-$STAMP.sql"
fi
gzip "$DEST/corporate-db-$STAMP.sql"

tar -czf "$DEST/corporate-storage-$STAMP.tar.gz" -C "$(dirname "$0")/.." storage/app/public

echo "Backup written:"
ls -lh "$DEST/corporate-db-$STAMP.sql.gz" "$DEST/corporate-storage-$STAMP.tar.gz"
