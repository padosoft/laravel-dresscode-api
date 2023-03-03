<?php

namespace Padosoft\LaravelDressCodeApi\dto;

class ProductLanguageDto extends BaseDto
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
        parent::__construct();
    }

    public static function create(string $languageId, ?string $name, ?string $description, ?string $composition, ?string $madeIn, ?string $sizeAndFit, ?string $notes, $customData): ProductLanguageDto
    {
        return new self($languageId, $name, $description, $composition, $madeIn, $sizeAndFit, $notes, $customData);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'languageId' => $this->languageId,
            'name' => $this->name,
            'description' => $this->description,
            'composition' => $this->composition,
            'madeIn' => $this->madeIn,
            'sizeAndFit' => $this->sizeAndFit,
            'notes' => $this->notes,
            'customData' => $this->customData,
        ];
    }

    /**
     * @return array
     */
    public function validationRoles(): array
    {
        return [
            'languageId' => 'required|string',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'composition' => 'nullable|string',
            'madeIn' => 'nullable|string',
            'sizeAndFit' => 'nullable|string',
            'notes' => 'nullable|string',
            'customData' => 'nullable',
        ];
    }

    /**
     * @return array
     */
    public function validationMessages(): array
    {
        return [
            'languageId.required' => 'languageId is required',
            'languageId.string' => 'languageId must be a string',
            'name.required' => 'name is required',
            'name.string' => 'name must be a string',
            'description.string' => 'description must be a string',
            'composition.string' => 'composition must be a string',
            'madeIn.string' => 'madeIn must be a string',
            'sizeAndFit.string' => 'sizeAndFit must be a string',
            'notes.string' => 'notes must be a string',
        ];
    }

    /**
     * @return array
     */
    public function validationAttributes(): array
    {
        return [
            'languageId' => 'Language Id',
            'name' => 'Name',
            'description' => 'Description',
            'composition' => 'Composition',
            'madeIn' => 'Made in',
            'sizeAndFit' => 'Size and fit',
            'notes' => 'Notes',
            'customData' => 'Custom Data',
        ];
    }
}
