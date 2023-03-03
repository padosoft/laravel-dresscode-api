<?php

namespace Padosoft\LaravelDressCodeApi\dto;

class ProductLanguageDto
{
    public string $languageId;
    public ?string $name;
    public ?string $description;
    public ?string $composition;
    public ?string $madeIn;
    public ?string $sizeAndFit;
    public ?string $notes;
    public $customData;

    public function __construct(string $languageId, ?string $name, ?string $description, ?string $composition, ?string $madeIn, ?string $sizeAndFit, ?string $notes, $customData)
    {
        $this->languageId = $languageId;
        $this->name = $name;
        $this->description = $description;
        $this->composition = $composition;
        $this->madeIn = $madeIn;
        $this->sizeAndFit = $sizeAndFit;
        $this->notes = $notes;
        $this->customData = $customData;
    }

    public static function create(string $languageId, ?string $name, ?string $description, ?string $composition, ?string $madeIn, ?string $sizeAndFit, ?string $notes, $customData): ProductLanguageDto
    {
        return new self($languageId, $name, $description, $composition, $madeIn, $sizeAndFit, $notes, $customData);
    }
}
