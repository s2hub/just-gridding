<?php

namespace S2Hub\JustGridding\Examples\Basics;

use Override;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\HasManyList;

/**
 * @property string $Title
 * @method HasManyList<SimpleRecord> SimpleRecords()
 */
class Category extends DataObject
{
    private static $table_name = 'JustGridding_Category';

    private static $db = [
        'Title' => 'Varchar',
    ];

    private static $has_many = [
        'SimpleRecords' => SimpleRecord::class,
    ];

    #[Override]
    public function requireDefaultRecords()
    {
        parent::requireDefaultRecords();

        if (Category::get()->count() === 0) {
            $categories = ['General', 'Urgent', 'Low Priority'];
            foreach ($categories as $title) {
                $category = Category::create();
                $category->Title = $title;
                $category->write();
            }
        }
    }
}
