<?php

namespace S2Hub\JustGridding\Examples\Basics;

use Override;
use S2Hub\JustGridding\Examples\Common\ProvidesExampleDocs;
use SilverStripe\ORM\DataObject;

/**
 * A simple DataObject to demonstrate basic GridField configurations.
 *
 * @property string $Title
 * @property string $Description
 * @property string $Status
 * @property int $CategoryID
 * @method Category Category()
 */
class SimpleRecord extends DataObject
{
    use ProvidesExampleDocs;

    private static $table_name = 'JustGridding_SimpleRecord';

    private static $db = [
        'Title' => 'Varchar',
        'Description' => 'Text',
        'Status' => 'Enum("New,Active,Closed", "New")',
    ];

    private static $has_one = [
        'Category' => Category::class,
    ];

    private static $summary_fields = [
        'Title' => 'Title',
        'Category.Title' => 'Category',
        'Status' => 'Status',
    ];

    #[Override]
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        if ($docField = $this->getExampleDocsField()) {
            $fields->unshift($docField);
        }

        return $fields;
    }

    #[Override]
    public function requireDefaultRecords()
    {
        parent::requireDefaultRecords();

        if (SimpleRecord::get()->count() === 0) {
            $category = Category::get()->first();
            $categoryId = $category ? $category->ID : 0;

            for ($i = 1; $i <= 10; $i++) {
                $record = SimpleRecord::create();
                $record->Title = "Example Record $i";
                $record->Description = "Example record $i. Demonstrates GridField with data.";
                $record->Status = ($i % 3 === 0) ? 'Closed' : (($i % 2 === 0) ? 'Active' : 'New');
                if ($categoryId) {
                    $record->CategoryID = $categoryId;
                }
                $record->write();
            }
        }
    }
}
