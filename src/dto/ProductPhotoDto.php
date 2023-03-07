<?php

namespace Padosoft\LaravelDressCodeApi\dto;

use Illuminate\Database\Eloquent\Model;

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
     * Crea un nuovo oggetto ProductPhotoDto a partire da un oggetto Model.
     *
     * @param Model $model L'oggetto Model da cui creare il ProductPhotoDto.
     * @return ProductPhotoDto Il nuovo oggetto ProductPhotoDto.
     *
     * @property int $position La posizione della foto all'interno della galleria.
     * @property string|null $tag Il tag associato alla foto (se presente).
     * @property string $url L'URL della foto.
     */

    public static function createFromModel(Model $model): ProductPhotoDto
    {
        return new self(
            $model->position,
            $model->tag,
            $model->url
        );
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
