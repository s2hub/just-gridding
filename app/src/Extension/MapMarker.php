<?php

namespace Netwerkstatt\Site\Extension;

use SilverStripe\Core\Extension;
use Bigfork\SilverStripeMapboxField\MapboxField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\LiteralField;

/**
 * Class \Netwerkstatt\Site\Extension\MapMarker
 *
 * @property MapMarker $owner
 * @property string $Content
 */
class MapMarker extends Extension
{
    /**
     * @config
     */
    private static array $db = [
        'Content' => 'HTMLText'
    ];

    public function updateCMSFields(FieldList $fields): void
    {
        $fields->removeByName(['Latitude', 'Longitude', 'Position', 'LocationMap']);
        $fields->insertAfter(
            'Description',
            MapboxField::create('LocationMap', 'Choose a location', 'Latitude', 'Longitude')
        );

        $fields->insertAfter('Description', HTMLEditorField::create('Content', 'Lange Beschreibung'));

        if (!$this->getOwner()->exists()) {
            $imagesFolderNotice = LiteralField::create(
                'ImageGalleryNotice',
                '<p>Bitte speichern, damit Bilder hinzugefügt werden können'
            );
            $fields->replaceField('PhotoGalleryImages', $imagesFolderNotice);
        }
    }

    public function getBulkUploadFolderName()
    {
        return 'locations';
//        return FluentState::singleton()->withState(function (FluentState $state) {
//            $state->setLocale('de_DE');
//            return 'locations/' . $this->getOwner()->URLSlug;
//        });
    }
}
