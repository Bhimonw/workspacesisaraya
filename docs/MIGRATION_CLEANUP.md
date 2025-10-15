# Migration cleanup: duplicate votes migration

While running migrations we found a duplicate migration that also creates the `votes` table:

- `database/migrations/2025_10_13_184303_create_votes_table.php` (canonical)
- `database/migrations/2025_10_14_000004_create_votes_table.php` (duplicate)

Keeping multiple migration files that create the same table causes duplicate-creation errors on fresh databases and unexpected class-name resolution issues for the migrator. To fix this:

1. Remove the duplicate migration file(s) listed above. Keep the canonical migration `2025_10_13_184303_create_votes_table.php` which matches the app models and controllers.
2. Commit the removal and push to the main repository.
3. If you need to preserve the duplicate migration content for reference, move it to `docs/archive/` instead of keeping it in `database/migrations`.

After the change, run locally:

```powershell
# from project root
composer dump-autoload -o
php artisan optimize:clear
php artisan migrate --seed --force
```

Rationale: This keeps the migration history consistent and prevents Laravel from attempting to compute class names for multiple similarly-named files (which can cause "Class not found" or "Cannot redeclare class" errors).
