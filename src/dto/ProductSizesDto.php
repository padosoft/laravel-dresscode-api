<?php

namespace Padosoft\LaravelDressCodeApi\dto;

class ProductSizesDto
{
    /**
     * @var ProductSizeDto[]
     */
    public array $sizes;

    public function __construct(array $sizes)
    {
        $this->sizes = $sizes;
    }

    public static function create(array $sizes): ProductSizesDto
    {
        $productSizes = array_map(function ($size) {
            return ProductSizeDto::create(
                $size['sizeId'],
                $size['gtin'] ?? null,
                $size['stocks'] ?? null,
                $size['prices'] ?? null
            );
        }, $sizes);

        return new self($productSizes);
    }
}
