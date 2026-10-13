# Symfony Sandbox

## Language

- Respond in Japanese
- Write code, comments, commit messages, and project documentation in English
- Write English naturally and idiomatically rather than translating literally from Japanese

## Tech Stack

- PHP 8.4 (`~8.4.0` in `composer.json`)
- Symfony 7.4
- Monolog for logging
- PostgreSQL 18 with Doctrine ORM
- Twig for templates
- AssetMapper for frontend assets (no Node.js build step)
- Tailwind CSS for styling
- Stimulus for JavaScript behavior
- PHP-CS-Fixer for code style
- PHPStan for static analysis
- PHPUnit for testing
- Dev Container (Docker Compose with `php-fpm`, `nginx`, and `db` services)

## Development Environment

- Coding agent runs inside the `php-fpm` container; run commands directly rather than through `docker compose exec`
- App URL: `http://nginx` from inside the container, `http://localhost:8080` from the host browser
- Database: `db:5432`, database `app`; connection is set via the `DATABASE_URL` environment variable in `.devcontainer/docker-compose.yaml`
- `psql` is not installed; use `bin/console dbal:run-sql` for ad-hoc queries

## Common Commands

```bash
bin/console tailwind:build --watch
vendor/bin/php-cs-fixer fix
vendor/bin/phpstan analyse
vendor/bin/phpunit
```

- Before committing changes to PHP code, configuration, or templates, run the `pre-commit-check` skill
- Manage schema changes with Doctrine migrations (`doctrine:migrations:diff` / `doctrine:migrations:migrate`); never use `doctrine:schema:update --force`

## Architecture

- Layered structure under `src/`: `Domain`, `Application`, `Infrastructure`
- Dependencies point inward only: `Infrastructure` → `Application` → `Domain`
- Keep domain logic free of framework and infrastructure details; Doctrine mapping attributes, Symfony Uid, and Security user interfaces on entities are fine
- `tests/` mirrors the `src/` layout
- See `.cursor/rules/architecture.mdc` for layer-specific conventions

## Conventions

- When adding or ordering items, follow established conventions; if none exists, use a consistent order (e.g., alphabetical) and explain the reasoning
- Add English words flagged by cspell to `words` in `cspell.json`
- Write code directly instead of generating it with `make:*`; MakerBundle is not installed
- Follow `.markdownlint.yaml` for Markdown

## Dependencies

- Never add or update packages yourself (`composer require`, `composer update`, `importmap:require`, `importmap:update`, `npm install <package>`, etc.), even when one is needed during implementation
- Installing from lock files (`composer install`, `npm ci`) is fine
- When a package is needed, run the `add-package` skill

## Environment Variables and Secrets

- `.env` is committed and holds only placeholder or default values; real values go in `.env.local` or `.env.*.local`, which are not committed
- When adding an environment variable, also add it to `.env` with a placeholder value
- Never read real environment values or secrets by any means, including Bash commands (e.g., `.env.local`, `.env.*.local`, `.env.local.php`, secret decryption keys, `bin/console debug:dotenv`, `bin/console secrets:reveal`)
- When real values or secrets are needed, ask the user
