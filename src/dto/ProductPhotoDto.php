<?php

namespace Padosoft\LaravelDressCodeApi\dto;

use Padosoft\LaravelDressCodeApi\dto\traits\DtoValidationTraits;
use Padosoft\LaravelDressCodeApi\interfaces\DtoValidationInterface;

class ProductPhotoDto extends BaseDto
{
    public int $position;
    public ?string $tag;
    public string $url;

    public function __construct(int $position, ?string $tag, string $url)
    {
        $this->position = $position;
        $this->tag = $tag;
        $this->url = $url;
        parent::__construct();
    }

    public static function create(int $position, ?string $tag, string $url): ProductPhotoDto
    {
        return new self($position, $tag, $url);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'position' => $this->position,
            'tag' => $this->tag,
            'url' => $this->url,
        ];
    }

    /**
     * @return array
     */
    public function validationRoles(): array
    {
        return [
            'position' => 'required|integer',
            'tag' => 'nullable|string',
            'url' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function validationMessages(): array
    {
        return [
            'position.required' => 'The position is required.',
            'position.integer' => 'The position must be an integer.',
            'tag.string' => 'The tag must be a string.',
            'tag.nullable' => 'The tag must be null.',
            'url.required' => 'The url is required.',
            'url.string' => 'The url must be a string.',
        ];
    }

    /**
     * @return array
     */
    public function validationAttributes(): array
    {
        return [
            'position' => 'position',
            'tag' => 'tag',
            'url' => 'url',
        ];
    }
}
