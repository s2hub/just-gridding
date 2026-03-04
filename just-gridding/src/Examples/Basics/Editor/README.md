---
difficulty: Beginner
status: Completed
tags:
  - CRUD
  - Standard
---

# Basics (Editor)

The default configuration for managing records. It allows creating, editing, and deleting objects.

This configuration is the standard for most ModelAdmin implementations.

## Snippet
<!-- [SNIPPET_START: Basics_Editor] -->
```php
$gridField->setConfig(GridFieldConfig_RecordEditor::create());
```
<!-- [SNIPPET_END] -->
