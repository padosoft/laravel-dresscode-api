<?php

namespace Padosoft\LaravelDressCodeApi\dto;

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
}
