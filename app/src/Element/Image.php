<?php

namespace Netwerkstatt\Site\Element;

use DNADesign\Elemental\Models\BaseElement;
use Exception;
use Override;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image as SSImage;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\FieldType\DBField;
use SilverStripe\ORM\FieldType\DBHTMLText;

/**
 * @method SSImage Image()
 * @phpstan-ignore annotations.method
 */
class Image extends BaseElement
{
    /**
     * @var string
     * @config
     */
    private static string $icon = 'font-icon-block-file';

    /**
     * @return string
     * @config
     */
    private static string $singular_name = 'Image';

    /**
     * @return string
     * @config
     */
    private static string $plural_name = 'Images';

    /**
     * @var string
     * @config
     */
    private static string $table_name = 'ElementImage';

    /**
     * @var string[]
     * @config
     */
    private static array $db = [
        'Caption' => 'Varchar(255)'
    ];

    /**
     * @var array
     * @config
     */
    private static array $has_one = [
        'Image' => SSImage::class,
    ];

    /**
     * @var array
     * @config
     */
    private static array $owns = [
        'Image',
    ];

    /**
     * @var bool
     * @config
     */
    private static bool $inline_editable = false;

    #[Override]
    public function getCMSFields(): FieldList
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields): void {
            $imageField = $fields->fieldByName('Root.Main.Image');
            if ($imageField instanceof UploadField) {
                $imageField->setFolderName('Uploads/ElementImage')
                    ->setAllowedFileCategories('image')
                    ->setAllowedMaxFileNumber(1);
            }
        });

        return parent::getCMSFields();
    }


    #[Override]
    public function getSummary(): string
    {
        if ($this->Image()->exists()) {
            $summary = implode(' - ', [$this->Image()->Name, $this->Caption]);

            /** @var DBHTMLText $htmlField */
            $htmlField = DBField::create_field(DBHTMLText::class, $summary);

            return $htmlField->Summary(20);
        }

        return parent::getSummary();
    }

    #[Override]
    protected function provideBlockSchema(): array
    {
        $blockSchema = [];
        try {
            $blockSchema = parent::provideBlockSchema();
        } catch (Exception) {
        }

        $blockSchema['content'] = $this->getSummary();

        return $blockSchema;
    }

    #[Override]
    public function getType(): string
    {
        return _t(Image::class . '.BlockType', 'Image');
    }
}
