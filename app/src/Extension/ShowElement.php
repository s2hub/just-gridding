<?php

namespace Netwerkstatt\Site\Extension;

use SilverStripe\Core\Extension;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\FieldList;

/**
 * Class \Netwerkstatt\Site\Extension\ShowElement
 *
 * @property BaseElement|ShowElement $owner
 * @property bool $ShowElement
 */
class ShowElement extends Extension
{
    /**
     * @config
     */
    private static array $db = [
        'ShowElement' => 'Boolean'
    ];

    /**
     * @config
     */
    private static array $defaults = [
        'ShowElement' => '1'
    ];

    /**
     * @config
     */
    private static array $translate = [
        'ShowElement'
    ];

    /**
     * @config
     */
    private static array $summary_fields = [
        'IsShown' => 'ShowElement.Nice'
    ];

    public function updateCMSFields(FieldList $fields): void
    {
        $anchorField = CheckboxField::create('ShowElement');
        $fields->insertAfter('Title', $anchorField);
    }
}
