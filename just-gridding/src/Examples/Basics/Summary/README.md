# Basics (Summary Fields)

The columns displayed in a `GridField` can be controlled via the `$summary_fields` property on the `DataObject`.

This allows for:
- Standard database fields
- Relation fields (using dot notation, e.g., `Category.Title`)
- Custom methods defined on the `DataObject`

## Snippet
<!-- [SNIPPET_START: Basics_Summary] -->
```php
$gridField->setConfig(GridFieldConfig_Base::create());
$gridField->getConfig()
    ->getComponentByType(\SilverStripe\Forms\GridField\GridFieldDataColumns::class)
    ->setDisplayFields([
        'Title' => 'Main Title',
        'Category.Title' => 'Associated Category',
        'getSummaryStatus' => 'Formatted Status',
    ]);
```
<!-- [SNIPPET_END] -->
