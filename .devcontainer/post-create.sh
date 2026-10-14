#!/bin/bash
set -euo pipefail

# Install Composer dependencies
if [ -f "composer.json" ]; then
  composer install
fi

# Install npm dependencies
if [ -f "package-lock.json" ]; then
  npm ci
fi
