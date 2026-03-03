<?php

namespace Netwerkstatt\Site\Page;

use Page;
use Override;
use DNADesign\Elemental\Extensions\ElementalPageExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\LiteralField;
use TractorCow\Fluent\Model\Locale;

/**
 * Class \Netwerkstatt\Site\Page\BlockPage
 *
 * @property int $ElementalAreaID
// * @method ElementalArea ElementalArea()
 * @mixin ElementalPageExtension
 */
class BlockPage extends Page
{
    /**
     * @var string
     * @config
     */
    private static $table_name = 'BlockPage';

    /**
     * @config
     */
    private static $db = [
    ];

    /**
     * @var string[]
     * @config
     */
    private static $extensions = [
        ElementalPageExtension::class
    ];

    #[Override]
    protected function onBeforeWrite(): void
    {
        parent::onBeforeWrite();
        if (!$this->isDraftedInLocale() && $this->isInDB()) {
            $elementalArea = $this->ElementalArea();
            $elementalAreaNew = $elementalArea->duplicate();
            $this->ElementalAreaID = $elementalAreaNew->ID;
        }
    }

    #[Override]
    public function getCMSFields(): FieldList
    {
        $fields = parent::getCMSFields();
        if (!$this->isDraftedInLocale()) {
            $elementalNotice = LiteralField::create(
                'ElementalArea',
                '<p>Bitte zuerst die neue Sprache speichern, bevor die Elemente bearbeitet werden können</p>'
            );
            $fields->replaceField('ElementalArea', $elementalNotice);
        }

        return $fields;
    }

    /**
     * Override default Fluent fallback
     * @see https://github.com/silverstripe/silverstripe-elemental/blob/4/docs/en/advanced_setup.md#elemental-with-fluent-setup
     *
     * @param string $query
     * @param string $table
     * @param string $field
     */
    public function updateLocaliseSelect(&$query, $table, $field, Locale $locale): void
    {
         // disallow elemental data inheritance in the case that published localised page instance already exists
        if ($field === 'ElementalAreaID' && $this->isPublishedInLocale()) {
            $query = '"' . $table . '_Localised_' . $locale->getLocale() . '"."' . $field . '"';
        }
    }
}
