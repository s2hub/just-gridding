<?php

namespace S2Hub\JustGridding\Utils;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

/**
 * Utility to synchronize code snippets from PHP files to README.md files.
 */
class DocSynchronizer
{
    /**
     * Synchronizes all snippets in the given directory.
     *
     * @param string $srcDir
     * @return void
     */
    public static function syncAll(string $srcDir): void
    {
        $snippets = DocSynchronizer::collectSnippets($srcDir);
        DocSynchronizer::updateReadmes($srcDir, $snippets);
    }

    /**
     * Collects all snippets from PHP files in the directory.
     *
     * @param string $srcDir
     * @return array<string, string>
     */
    protected static function collectSnippets(string $srcDir): array
    {
        $snippets = [];
        $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($srcDir));
        foreach ($it as $file) {
            if ($file->isFile() && $file->getExtension() === 'php') {
                $fileSnippets = SourceCodeExtractor::extract($file->getRealPath());
                foreach ($fileSnippets as $name => $code) {
                    $snippets[$name] = $code;
                }
            }
        }
        return $snippets;
    }

    /**
     * Updates all README.md files with the collected snippets.
     *
     * @param string $srcDir
     * @param array<string, string> $snippets
     * @return void
     */
    protected static function updateReadmes(string $srcDir, array $snippets): void
    {
        $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($srcDir));
        foreach ($it as $file) {
            if ($file->isFile() && $file->getFilename() === 'README.md') {
                $content = file_get_contents($file->getRealPath());
                $originalContent = $content;

                foreach ($snippets as $name => $code) {
                    $pattern = '/(<!-- \[SNIPPET_START: ' . preg_quote($name, '/') . '\] -->)(.*?)(<!-- \[SNIPPET_END\] -->)/s';
                    $replacement = '$1' . "\n```php\n" . $code . "\n```\n" . '$3';
                    
                    $content = preg_replace($pattern, $replacement, (string)$content);
                }

                if ($content !== $originalContent) {
                    file_put_contents($file->getRealPath(), $content);
                    echo "Updated: " . $file->getPathname() . "\n";
                }
            }
        }
    }
}
