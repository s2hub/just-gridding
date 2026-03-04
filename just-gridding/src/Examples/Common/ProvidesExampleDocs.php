<?php

namespace S2Hub\JustGridding\Examples\Common;

use Parsedown;
use ReflectionClass;
use SilverStripe\Forms\LiteralField;
use SilverStripe\View\HTML;

/**
 * Trait to add a Markdown-based documentation field to a DataObject's CMS fields.
 */
trait ProvidesExampleDocs
{
    /**
     * Returns a LiteralField containing the parsed Markdown from a README.md file
     * located in the same directory as the class provided or the class using this trait.
     *
     * @param string $className Class name to look for README.md next to. If null, use the current instance class.
     * @param string $name Name of the field
     * @return LiteralField|null
     */
    protected function getExampleDocsField(?string $className = null, string $name = 'ExampleDocs')
    {
        $className = $className ?: $this::class;
        $reflection = new ReflectionClass($className);
        $directory = dirname($reflection->getFileName());
        $readmePath = $directory . '/README.md';

        if (!file_exists($readmePath)) {
            return null;
        }

        $markdown = file_get_contents($readmePath);
        $parsedown = new Parsedown();
        $html = $parsedown->text($markdown);

        // Wrap in a div with some styling to make it look nice in the CMS
        $content = HTML::createTag('div', [
            'class' => 'message notice gridfield-example-docs',
            'style' => 'margin-bottom: 20px; padding: 15px; border-left: 5px solid #0071b3; background-color: #f0f7fb;'
        ], $html);

        return LiteralField::create($name, $content);
    }

    /**
     * Static helper to get the documentation field for a specific class.
     *
     * @param string $className
     * @param string $name
     * @return LiteralField|null
     */
    public static function getDocsForClass(string $className, string $name = 'ExampleDocs')
    {
        // We use a dummy object to access the protected method if it's called on a class using the trait
        // or we just reimplement/refactor the logic to be static-friendly.
        // For simplicity in a trait, we'll just make the logic static-callable.

        $reflection = new ReflectionClass($className);
        $directory = dirname($reflection->getFileName());
        $readmePath = $directory . '/README.md';

        if (!file_exists($readmePath)) {
            return null;
        }

        $markdown = file_get_contents($readmePath);
        $parsedown = new Parsedown();
        $html = $parsedown->text($markdown);

        // Wrap in a div with some styling to make it look nice in the CMS
        $content = HTML::createTag('div', [
            'class' => 'message notice gridfield-example-docs',
            'style' => 'margin-bottom: 20px; padding: 15px; border-left: 5px solid #0071b3; background-color: #f0f7fb;'
        ], $html);

        return LiteralField::create($name, $content);
    }
}
