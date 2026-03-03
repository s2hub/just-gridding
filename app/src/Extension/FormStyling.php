<?php

namespace Netwerkstatt\Site\Extension;

use SilverStripe\Core\Extension;
use SilverStripe\Forms\Form;

/**
 * Class \Netwerkstatt\Site\Extension\FormStyling
 *
 * @property \SilverStripe\Forms\Form|\Netwerkstatt\Site\Extension\FormStyling $owner
 */
/**
 * Class \Netwerkstatt\Site\Extension\FormStyling
 *
 * @property Form|FormStyling $owner
 */
class FormStyling extends Extension
{
    protected $fieldSetClasses = [];

    public function addFieldsetClass($class)
    {
        $classes = preg_split('#\s+#', (string) $class);

        foreach ($classes as $class) {
            $this->fieldSetClasses[$class] = $class;
        }

        return $this->getOwner();
    }

    public function getFieldsetClasses(): string
    {
        return implode(' ', $this->fieldSetClasses);
    }
}
