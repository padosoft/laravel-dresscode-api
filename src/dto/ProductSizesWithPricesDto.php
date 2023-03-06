<?php
namespace Padosoft\LaravelDressCodeApi\dto;

use Illuminate\Support\Collection;

class ProductSizesWithPricesDto extends BaseDto
{
    /**
     * @var ProductSizeWithPriceDto[]
     */
    public array $sizes;

    public function __construct(array $sizes)
    {
        // Aggiungiamo un controllo sui dati in ingresso
        foreach ($sizes as $size) {
            if (!$size instanceof ProductSizeWithPriceDto) {
                throw new \InvalidArgumentException('Array must contain only ProductSizeWithPriceDto objects');
            }
        }
        $this->sizes = $sizes;
    }

    /**
     * Crea un'istanza di ProductSizesWithPricesDto a partire da un array di oggetti ProductSizeWithPriceDto.
     *
     * @param array $sizes
     * @return ProductSizesWithPricesDto
     */
    public static function create(array $sizes): ProductSizesWithPricesDto
    {
        $productSizes = [];
        foreach ($sizes as $size) {
            $productSizes[] = ProductSizeWithPriceDto::create(
                $size['sizeId'],
                $size['gtin'] ?? null,
                $size['stocks'] ?? null,
                $size['prices'] ?? null
            );
        }

        return new self($productSizes);
    }

    /**
     * Crea un'istanza di ProductSizesWithPricesDto a partire da una collezione di oggetti Model.
     *
     * @param Collection $collection
     * @return ProductSizesWithPricesDto
     */
    public static function createFromCollection(Collection $collection, array $syncName = []): ProductSizesWithPricesDto
    {
        $productSizes = [];
        foreach ($collection as $item) {
            $productSizes[] = ProductSizeWithPriceDto::createFromModel($item, $syncName);
        }

        return new self($productSizes);
    }

    /**
     * Restituisce un array di oggetti ProductSizeWithPriceDto.
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
