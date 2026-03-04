<?php

namespace S2Hub\JustGridding\Examples\Common;

use ReflectionClass;
use S2Hub\JustGridding\Utils\MarkdownRenderer;
use SilverStripe\Forms\LiteralField;

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
        return static::getDocsForClass($className ?: $this::class, $name);
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
        $reflection = new ReflectionClass($className);
        $directory = dirname($reflection->getFileName());
        $readmePath = $directory . '/README.md';

        if (!file_exists($readmePath)) {
            return null;
        }

        $markdownRaw = file_get_contents($readmePath);
        $content = MarkdownRenderer::render($markdownRaw);

        return LiteralField::create($name, $content);
    }
}
