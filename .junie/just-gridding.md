# Just Gridding Module Guidelines

## Module Structure
- All logic for the examples is located in `just-gridding/src/`.
- Silverstripe recognition is ensured by `just-gridding/_config/`.
- The namespace `S2Hub\JustGridding\` is mapped to `just-gridding/src/` via PSR-4.

## Hierarchy
- **Groups (Admins)**: Each example category (e.g., Basics, Relationships) has its own `ModelAdmin` class in `just-gridding/src/Admin/`.
- **Documentation**:
    - Each group has a `README.md` in its directory (e.g., `just-gridding/src/Examples/Basics/README.md`) for general info displayed above the tabs.
    - Each individual example (tab) has its own subdirectory with a `README.md` for specific details (e.g., `just-gridding/src/Examples/Basics/Base/README.md`).

## Code Snippets & "Single Source of Truth"
- PHP configuration snippets are defined directly in the `ModelAdmin` classes.
- Snippets are marked with comments:
  ```php
  // [SNIPPET_START: ExampleName]
  $gridField->setConfig(...);
  // [SNIPPET_END]
  ```
- These snippets are:
    1. Extracted and displayed in the CMS with syntax highlighting.
    2. Automatically synchronized to the respective `README.md` files for GitHub visibility.

## Synchronization
- Use `ddev sync-docs` (custom script) to update Markdown files from PHP snippets.
- This command is part of the `ddev ci` pipeline to ensure documentation is always up-to-date.

## UI Standards
- All GridField examples use **Prism.js** for syntax highlighting in the CMS.
- General group info is displayed above the tabs via a custom `ModelAdmin_Content.ss` template override.
