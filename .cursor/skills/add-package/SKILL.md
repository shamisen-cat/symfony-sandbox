---
name: add-package
description: >-
  Guide adding a Composer or importmap package, from proposing the command for
  the user to run through reviewing the result and committing. Use when the
  user wants to add a package or one is needed during implementation.
disable-model-invocation: true
---

# Add package

The user runs the install command; never run it yourself.

## Steps

1. Prepare.
   - Work on a branch created from `develop`
   - Make sure the working tree is clean so the diff shows only what the package adds
   - If a package is needed during other work, ask the user where to add it, then stash the work in progress (`git stash -u`) instead of committing it:
     - On the current branch, when only the work in progress uses it
     - On a separate branch from `develop`, when it is used more broadly

2. Propose the command.
   - Confirm the full package name (not a Flex alias) and whether it belongs in `require-dev`
   - Check the official installation docs for setup steps beyond the install command
   - Give the exact command and ask the user to run it (e.g., `composer require <package>`, `bin/console importmap:require <package>`)

3. Review the result before changing anything.
   - Read the command output, including the recipe's "What's next" notes
   - List the changes with `git status --short --untracked-files=all`
   - Explain each new or changed file, paying particular attention to changes to existing files such as `config/bundles.php`, `.env`, `.gitignore`, `phpunit.dist.xml`, `importmap.php`, and templates
   - For Composer packages, list the packages newly added to `composer.lock`, including dependencies
   - Do not format or edit generated files yet, so the user can review them as generated

4. Finish the setup.
   - Explain setup commands from the docs (e.g., `bin/console tailwind:init`) and run them only after the user agrees
   - Propose changes to the generated configuration and apply them after the user agrees
   - Keep values added to `.env` as placeholders
   - Add words flagged by cspell to `cspell.json`
   - Update the tech stack in `AGENTS.md` and `README.md` only when the package is a technology developers work with directly, not for every bundle
   - Add commands developers run regularly (e.g., a watch command) to Common Commands in `AGENTS.md` and the development commands in `README.md`

5. Run the `pre-commit-check` skill. Report formatting changes separately from the generated changes. A `config/reference.php` diff caused by the package is intended.

6. After the user confirms, commit with a message in the form `chore: add <name>` (e.g., `chore: add SecurityBundle`). If the work in progress was stashed in step 1, restore it in this order:
   - when the package was added on a separate branch, merge it into `develop` after the user approves, then rebase the work branch onto `develop`
   - Return to the work branch and restore the work with `git stash pop`
