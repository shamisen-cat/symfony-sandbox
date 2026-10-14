import js from '@eslint/js';
import { defineConfig, globalIgnores } from 'eslint/config';
import globals from 'globals';

export default defineConfig([
    globalIgnores([
        'assets/controllers/csrf_protection_controller.js',
        'assets/stimulus_bootstrap.js',
        'assets/vendor/',
        'node_modules/',
        'public/assets/',
        'public/bundles/',
        'var/',
        'vendor/',
    ]),
    {
        files: ['**/*.js'],
        plugins: { js },
        extends: ['js/recommended'],
        rules: {
            eqeqeq: 'error',
            'no-var': 'error',
            'prefer-const': 'error',
        },
    },
    {
        files: ['assets/**/*.js'],
        languageOptions: {
            globals: globals.browser,
        },
    },
]);
