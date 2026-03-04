<?php

namespace S2Hub\JustGridding\Utils;

use Parsedown;
use SilverStripe\View\HTML;
use Symfony\Component\Yaml\Yaml;

/**
 * Utility to render Markdown with YAML frontmatter.
 */
class MarkdownRenderer
{
    /**
     * Parses the markdown, handles frontmatter and returns the formatted HTML.
     *
     * @param string $markdownRaw
     * @return string
     */
    public static function render(string $markdownRaw): string
    {
        $data = MarkdownRenderer::parseFrontmatter($markdownRaw);

        $markdown = $data['content'];
        $metadata = $data['frontmatter'];

        $parsedown = new Parsedown();
        $html = $parsedown->text($markdown);

        // Prep some metadata display if present
        $metaHtml = '';
        if (!empty($metadata['difficulty'])) {
            $color = match (strtolower($metadata['difficulty'])) {
                'beginner' => '#28a745',
                'standard' => '#007bff',
                'advanced' => '#ffc107',
                'pro' => '#dc3545',
                default => '#6c757d'
            };
            $metaHtml .= HTML::createTag('span', [
                'style' => "display: inline-block; padding: 2px 8px; border-radius: 3px; background-color: $color; color: #fff; font-size: 0.8em; margin-bottom: 10px; text-transform: uppercase; font-weight: bold; vertical-align: middle;"
            ], $metadata['difficulty']);
        }

        if (!empty($metadata['status'])) {
            $metaHtml .= HTML::createTag('span', [
                'style' => "display: inline-block; padding: 2px 8px; border-radius: 3px; background-color: #e9ecef; color: #495057; font-size: 0.8em; margin-bottom: 10px; margin-left: 10px; font-weight: bold; vertical-align: middle;"
            ], 'Status: ' . $metadata['status']);
        }

        if (!empty($metadata['tags']) && is_array($metadata['tags'])) {
            foreach ($metadata['tags'] as $tag) {
                $metaHtml .= HTML::createTag('span', [
                    'style' => "display: inline-block; padding: 2px 8px; border-radius: 3px; background-color: #f8f9fa; border: 1px solid #dee2e6; color: #6c757d; font-size: 0.75em; margin-bottom: 10px; margin-left: 5px; vertical-align: middle;"
                ], $tag);
            }
        }

        if ($metaHtml !== '') {
            $metaHtml = HTML::createTag('div', ['style' => 'margin-bottom: 15px;'], $metaHtml);
        }

        // Wrap in a div with some styling to make it look nice in the CMS
        return HTML::createTag('div', [
            'class' => 'message notice gridfield-example-docs',
            'style' => 'margin-bottom: 20px; padding: 15px; border-left: 5px solid #0071b3; background-color: #f0f7fb;'
        ], $metaHtml . $html);
    }

    /**
     * Parses YAML frontmatter from a markdown string.
     *
     * @param string $content
     * @return array{frontmatter: array, content: string}
     */
    public static function parseFrontmatter(string $content): array
    {
        $frontmatter = [];
        // Support any newline sequence and make it more robust
        $pattern = '/^---[\r\n]+(.*?)[\r\n]+---[\r\n]+(.*)$/s';

        if (preg_match($pattern, trim($content), $matches)) {
            $frontmatter = Yaml::parse($matches[1]);
            $content = $matches[2];
        }

        return [
            'frontmatter' => is_array($frontmatter) ? $frontmatter : [],
            'content' => $content
        ];
    }
}
