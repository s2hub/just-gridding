<?php

namespace S2Hub\JustGridding\Admin;

use ReflectionClass;
use S2Hub\JustGridding\Utils\MarkdownRenderer;
use S2Hub\JustGridding\Utils\SourceCodeExtractor;
use SilverStripe\Admin\ModelAdmin;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\LiteralField;
use SilverStripe\View\Requirements;

/**
 * Base class for all example Admins in the Just Gridding module.
 */
abstract class AbstractGriddingAdmin extends ModelAdmin
{
    /**
     * Default priority for our example admins.
     * Higher numbers appear lower in the menu.
     */
    private static $menu_priority = 10;

    protected function init()
    {
        parent::init();

        // Load Prism.js for syntax highlighting in the CMS
        Requirements::css('https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism.min.css');
        Requirements::javascript('https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js');
        Requirements::javascript('https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-markup-templating.min.js');
        Requirements::javascript('https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-php.min.js');

        // Add Entwine trigger for Prism (re-highlights after PJAX loads)
        Requirements::customScript(<<<JS
            (function($) {
                $.entwine('ss', function($) {
                    $('.gridfield-example-docs pre code, .gridfield-example-header pre code').entwine({
                        onmatch: function() {
                            if (typeof Prism !== 'undefined') {
                                Prism.highlightElement(this[0]);
                            }
                        }
                    });
                });
            })(jQuery);
JS
        );
        
        // Custom styling for the docs
        Requirements::customCSS(<<<CSS
            .gridfield-example-docs {
                margin-bottom: 20px;
                padding: 15px;
                border-left: 5px solid #0071b3;
                background-color: #f0f7fb;
            }
            .gridfield-example-header {
                padding: 15px 20px;
                background: #fff;
                border-bottom: 1px solid #d0dce0;
                margin-bottom: 0;
            }
CSS
        );
    }

    public function getEditForm($id = null, $fields = null)
    {
        $form = parent::getEditForm($id, $fields);
        $modelTab = $this->modelTab;
        $gridField = $form->Fields()->dataFieldByName($this->sanitiseClassName($modelTab));

        if (!$gridField) {
            $gridField = $form->Fields()->dataFieldByName($modelTab);
        }

        if ($gridField instanceof GridField) {
            $this->configureGridField($gridField, (string)$modelTab);

            // Add Tab-specific Documentation
            if ($docField = $this->getTabDocumentation((string)$modelTab)) {
                $form->Fields()->unshift($docField);
            }
        }

        return $form;
    }

    /**
     * Template-accessible method to get general group info.
     */
    public function getGlobalGriddingInfo(): string
    {
        $readmePath = $this->getGroupReadmePath();
        if ($readmePath && file_exists($readmePath)) {
            $markdownRaw = file_get_contents($readmePath);
            return sprintf(
                '<div class="gridfield-example-header">%s</div>',
                MarkdownRenderer::render($markdownRaw)
            );
        }

        return '';
    }

    abstract protected function configureGridField(GridField $gridField, string $modelTab): void;

    abstract protected function getGroupReadmePath(): ?string;

    abstract protected function getTabReadmePath(string $modelTab): ?string;

    protected function getTabDocumentation(string $modelTab): ?LiteralField
    {
        $readmePath = $this->getTabReadmePath($modelTab);
        if ($readmePath && file_exists($readmePath)) {
            $markdownRaw = file_get_contents($readmePath);
            $html = MarkdownRenderer::render($markdownRaw);

            return LiteralField::create('TabDocs', $html);
        }
        return null;
    }

    protected function getSnippetField(string $modelTab): ?LiteralField
    {
        $reflection = new ReflectionClass($this);
        $snippets = SourceCodeExtractor::extract($reflection->getFileName());

        if (isset($snippets[$modelTab])) {
            $html = sprintf(
                '<div class="message info"><p><strong>Configuration:</strong></p>'
                . '<pre><code class="language-php">%s</code></pre></div>',
                htmlspecialchars($snippets[$modelTab])
            );
            return LiteralField::create('ConfigSnippet', $html);
        }

        return null;
    }
}
