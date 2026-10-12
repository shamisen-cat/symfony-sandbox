#!/bin/bash
set -euo pipefail

# Install Composer dependencies
if [ -f "composer.json" ]; then
  composer install
fi
