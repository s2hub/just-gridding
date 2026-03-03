<?php

namespace Netwerkstatt\Site\Extension;

use SilverStripe\Core\Extension;
use SilverStripe\Forms\GridField\GridFieldDetailForm;
use SilverStripe\Forms\GridField\GridFieldPaginator;

class ElementalAreaConfig extends Extension
{
    protected function updateConfig()
    {
        $this->getOwner()->addComponent(GridFieldPaginator::create());
        $this->getOwner()->getComponentByType(GridFieldDetailForm::class)->setShowPagination(true);
    }
}
