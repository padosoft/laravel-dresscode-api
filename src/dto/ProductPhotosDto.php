<?php

namespace Padosoft\LaravelDressCodeApi\dto;

use Illuminate\Support\Collection;

class ProductPhotosDto
{
    /**
     * @var ProductPhotoDto[]
     */
    public array $photos;

    public function __construct(array $photos)
    {
        $this->photos = $photos;
    }

    public static function create(array $photos): ProductPhotosDto
    {
        $productPhotos = array_map(function ($photo) {
            return ProductPhotoDto::create(
                $photo['position'],
                $photo['tag'] ?? null,
                $photo['url']
            );
        }, $photos);

        return new self($productPhotos);
    }

    public static function createFromCollection(Collection $collection, array $syncName = []): ProductPhotosDto
    {
        $productPhotos = $collection->map(function ($item) use ($syncName) {
            return ProductPhotoDto::createFromModel($item, $syncName);
        })->toArray();

        return new self($productPhotos);
    }

    public function toArray(): array
    {
        return array_map(function ($photo) {
            return $photo->toArray();
        }, $this->photos);
    }
}
