<?php

namespace S2Hub\JustGridding\Admin;

use S2Hub\JustGridding\Examples\Basics\SimpleRecord;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_Base;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

/**
 * Admin for basic GridField examples.
 */
class BasicsAdmin extends AbstractGriddingAdmin
{
    private static $managed_models = [
        'Basics_Base' => [
            'title' => 'Basics (Base)',
            'dataClass' => SimpleRecord::class,
        ],
        'Basics_Editor' => [
            'title' => 'Basics (Editor)',
            'dataClass' => SimpleRecord::class,
        ],
    ];

    private static $url_segment = 'grid-basics';
    private static $menu_title = 'Grid Basics';
    private static $menu_priority = 10;

    protected function configureGridField(GridField $gridField, string $modelTab): void
    {
        switch ($modelTab) {
            case 'Basics_Base':
                // [SNIPPET_START: Basics_Base]
                $gridField->setConfig(GridFieldConfig_Base::create());
                // [SNIPPET_END]
                break;
            case 'Basics_Editor':
                // [SNIPPET_START: Basics_Editor]
                $gridField->setConfig(GridFieldConfig_RecordEditor::create());
                // [SNIPPET_END]
                break;
        }
    }

    protected function getGroupReadmePath(): ?string
    {
        return dirname(__DIR__) . '/Examples/Basics/README.md';
    }

    protected function getTabReadmePath(string $modelTab): ?string
    {
        $map = [
            'Basics_Base' => 'Base',
            'Basics_Editor' => 'Editor',
        ];

        if (isset($map[$modelTab])) {
            return dirname(__DIR__) . "/Examples/Basics/{$map[$modelTab]}/README.md";
        }

        return null;
    }
}
