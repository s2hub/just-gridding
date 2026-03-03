<?php

namespace Netwerkstatt\Site\Extension;

use SilverStripe\Core\Extension;
use Bigfork\SilverStripeMapboxField\MapboxField;
use EdgarIndustries\ElementalMap\Provider\Mapbox;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\HiddenField;
use SilverStripe\Forms\TextField;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

/**
 * Class \Netwerkstatt\Site\Extension\MapBlock
 *
 * @property MapBlock $owner
 */
class MapBlock extends Extension
{
    /**
     * @config
     */
    private static array $defaults = [
        'Provider' => Mapbox::class
    ];

    /**
     * @config
     */
    private static array $many_many_extraFields = [
        'Markers' => [
            'Sort' => 'Int'
        ]
    ];

    public function updateCMSFields(FieldList $fields): void
    {
        $fields->removeByName([
            'Centre',
            'Provider'
        ]);

        $centreField = FieldGroup::create(
            'Centre',
            MapboxField::create('LocationMap', 'Choose a location', 'DefaultLatitude', 'DefaultLongitude'),
            TextField::create('DefaultZoom', 'Zoom')
        );

        $fields->insertBefore('Size', $centreField);
        $fields->addFieldToTab('Root.Main', HiddenField::create('Provider', Mapbox::class));

        $markersGrid = $fields->dataFieldByName('Markers');
        if ($markersGrid instanceof GridField) {
            $markersGrid->getConfig()->addComponent(GridFieldOrderableRows::create('Sort'));
        }
    }

    public function getShowmap(): bool
    {
        $style = $this->getOwner()->Style;
        return $style === 'default' || $style === 'full';
    }

    public function getShowMarkers(): bool
    {
        $style = $this->getOwner()->Style;
        return $style === 'justmarkers' || $style === 'justmarkerscentered' || $style === 'full';
    }
}
