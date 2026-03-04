<?php

namespace S2Hub\JustGridding\Utils;

/**
 * Utility to extract code snippets from PHP source files.
 */
class SourceCodeExtractor
{
    /**
     * Extracts snippets from a PHP file based on [SNIPPET_START: name] and [SNIPPET_END] tags.
     *
     * @param string $filePath
     * @return array<string, string> [SnippetName => SnippetContent]
     */
    public static function extract(string $filePath): array
    {
        if (!file_exists($filePath)) {
            return [];
        }

        $content = file_get_contents($filePath);
        $lines = explode("\n", $content);
        $snippets = [];
        $currentSnippetName = null;
        $currentSnippetLines = [];

        foreach ($lines as $line) {
            if (preg_match('/\/\/ \[SNIPPET_START: (.*)\]/', $line, $matches)) {
                $currentSnippetName = trim($matches[1]);
                $currentSnippetLines = [];
                continue;
            }

            if (preg_match('/\/\/ \[SNIPPET_END\]/', $line)) {
                if ($currentSnippetName !== null) {
                    $snippets[$currentSnippetName] = SourceCodeExtractor::cleanSnippet(implode("\n", $currentSnippetLines));
                    $currentSnippetName = null;
                }
                continue;
            }

            if ($currentSnippetName !== null) {
                $currentSnippetLines[] = $line;
            }
        }

        return $snippets;
    }

    /**
     * Cleans up snippet code (removes common indentation).
     */
    protected static function cleanSnippet(string $content): string
    {
        if ($content === '') {
            return '';
        }
        $lines = explode("\n", $content);

        // Find minimum indentation
        $minIndent = PHP_INT_MAX;
        foreach ($lines as $line) {
            if (trim($line) === '') {
                continue;
            }
            if (preg_match('/^(\s+)/', $line, $matches)) {
                $minIndent = min($minIndent, strlen($matches[1]));
            } else {
                $minIndent = 0;
                break;
            }
        }

        if ($minIndent === PHP_INT_MAX) {
            $minIndent = 0;
        }

        $cleanedLines = array_map(static function ($line) use ($minIndent): string {
            return (string)substr($line, $minIndent);
        }, $lines);

        return trim(implode("\n", $cleanedLines));
    }
}
