<?php

namespace Padosoft\LaravelDressCodeApi\dto;

use Illuminate\Support\Collection;

class ProductSizesDto extends BaseDto
{
    /**
     * @var ProductSizeDto[]
     */
    public array $sizes;

    public function __construct(array $sizes)
    {
        // Aggiungiamo un controllo sui dati in ingresso
        foreach ($sizes as $size) {
            if (!$size instanceof ProductSizeDto) {
                throw new \InvalidArgumentException('Array must contain only ProductSizeDto objects');
            }
        }
        $this->sizes = $sizes;
    }

    /**
     * Crea un'istanza di ProductSizesDto a partire da un array di oggetti ProductSizeDto.
     *
     * @param array $sizes
     *
     * @return ProductSizesDto
     */
    public static function create(array $sizes): ProductSizesDto
    {
        $productSizes = [];
        foreach ($sizes as $size) {
            $productSizes[] = ProductSizeDto::create(
                $size['sizeId'],
                $size['gtin'] ?? null,
                $size['stocks'] ?? null
            );
        }

        return new self($productSizes);
    }

    /**
     * Crea un'istanza di ProductSizesDto a partire da una collezione di oggetti Model.
     *
     * @param Collection $collection
     *
     * @return ProductSizesDto
     */
    public static function createFromCollection(Collection $collection): ProductSizesDto
    {
        $productSizes = [];
        foreach ($collection as $item) {
            $productSizes[] = ProductSizeDto::createFromModel($item);
        }

        return new self($productSizes);
    }

    /**
     * Restituisce un array di oggetti ProductSizeDto.
     *
     * @return array
     */
    public function toArray(): array
    {
        return array_map(function ($size) {
            return $size->toArray();
        }, $this->sizes);
    }
}
