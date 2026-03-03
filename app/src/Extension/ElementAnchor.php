<?php

namespace Netwerkstatt\Site\Extension;

use SilverStripe\Core\Extension;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\View\Parsers\URLSegmentFilter;

/**
 * Class \Netwerkstatt\Site\Extension\ElementAnchor
 *
 * @property BaseElement|ElementAnchor $owner
 * @property string $AnchorName
 */
class ElementAnchor extends Extension
{
    /**
     * @config
     */
    private static array $db = [
        'AnchorName' => 'Varchar'
    ];

    public function updateCMSFields(FieldList $fields): void
    {
        $anchorField = TextField::create('AnchorName');
        $fields->insertAfter('Title', $anchorField);
    }


    public function getAnchorTitle()
    {
        return $this->getOwner()->AnchorName;
    }

    public function onBeforeWrite(): void
    {
        if ($this->getOwner()->isChanged('AnchorName')) {
            $filter = URLSegmentFilter::create();
            $this->getOwner()->AnchorName = $filter->filter($this->getOwner()->AnchorName);
        }
    }
}
