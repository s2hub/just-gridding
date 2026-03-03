<?php

namespace Netwerkstatt\Site\Extension;

use SilverStripe\Core\Extension;
use Dynamic\Elements\Promos\Elements\ElementPromos;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldDataColumns;
use Symbiote\GridFieldExtensions\GridFieldEditableColumns;

/**
 * Class \Netwerkstatt\Site\Extension\PromoSize
 *
 * @property ElementPromos|PromoSize $owner
 */
class PromoSize extends Extension
{
    /**
     * @config
     */
    private static array $many_many_extraFields = [
        'Promos' => [
            'Size' => 'Varchar(16)', //Small, Wide
        ],
    ];

    public function updateCMSFields(FieldList $fields): void
    {
        if (!$this->getOwner()->ID) {
            return;
        }

        /** @var GridField $grid */
        $grid = $fields->dataFieldByName('Promos');
        $config = $grid->getConfig();
        /** @var GridFieldDataColumns $columns */
        $columns = $config->getComponentByType(GridFieldDataColumns::class);
        $displayFields = $columns->getDisplayFields($grid);
        $displayFields['Size'] = 'Breite';
        $columns->setDisplayFields($displayFields);

        $editableColumns = GridFieldEditableColumns::create()->setDisplayFields([
            'Size' => [
                'title' => 'Breite',
                'callback' => static fn($record, $column, $grid) => DropdownField::create($column)
                    ->setSource(['default' => 'Schmal', 'wide' => 'Breit'])
                    ->setEmptyString('Bitte auswählen')
            ]
        ]);
        $config->addComponent($editableColumns);
    }
}
