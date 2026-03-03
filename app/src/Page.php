<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;

    /**
 * Class \Page
 *
 */
    class Page extends SiteTree
    {
        /**
         * @var string
         * @config
         */
        private static $table_name = 'Page';

        /**
         * @var array
         * @config
         */
        private static $db = [];

        /**
         * @var array
         * @config
         */
        private static $has_one = [];
    }
}
