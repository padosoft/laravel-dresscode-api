<?php

namespace Padosoft\LaravelDressCodeApi\dto;

use Illuminate\Support\Collection;

class ProductLanguagesDto
{
    /**
     * @var ProductLanguageDto[]
     */
    public array $languages;

    public function __construct(array $languages)
    {
        $this->languages = $languages;
    }

    public static function create(array $languages): ProductLanguagesDto
    {
        $productLanguages = array_map(function ($language) {
            return ProductLanguageDto::create(
                $language['languageId'],
                $language['name'],
                $language['description'],
                $language['composition'],
                $language['madeIn'],
                $language['sizeAndFit'],
                $language['notes'],
                $language['customData']
            );
        }, $languages);

        return new self($productLanguages);
    }

    public static function createFromCollection(Collection $collection): ProductLanguagesDto
    {
        $productLanguages = $collection->map(function ($item) {
            return ProductLanguageDto::createFromModel($item);
        })->toArray();

        return new self($productLanguages);
    }
}
