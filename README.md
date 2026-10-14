# Symfony Sandbox

A playground for learning and experimenting with Symfony.

- [Symfony Sandbox](#symfony-sandbox)
  - [Tech Stack](#tech-stack)
  - [Prerequisites](#prerequisites)
  - [Getting Started](#getting-started)
  - [License](#license)

## Tech Stack

- PHP 8.4 / Symfony 7.4
- SecurityBundle
- Monolog
- PostgreSQL 18 / Doctrine ORM
- Twig / AssetMapper / Tailwind CSS / Stimulus
- PHP-CS-Fixer / Prettier / PHPStan / PHPUnit
- Dev Container (Docker Compose: `php-fpm`, `nginx`, `db`)

## Prerequisites

- Docker
- VS Code or a compatible IDE
- [Dev Containers](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-containers) extension (VS Code)

## Getting Started

1. Open this repository in VS Code.
2. Reopen in the Dev Container when prompted (or use **Dev Containers: Reopen in Container**).
3. Wait for the post-create script to finish (`composer install` when `composer.json` is present; `npm ci` when `package-lock.json` is present).
4. Build Tailwind CSS once with `bin/console tailwind:build` (use `--watch` while editing styles).
5. Open [http://localhost:8080](http://localhost:8080) in your browser.

## License

This project is licensed under the [MIT License](LICENSE).
