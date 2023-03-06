<?php

namespace Padosoft\LaravelDressCodeApi\dto;

use Illuminate\Support\Collection;

class ProductPricesDto
{
    /**
     * @var ProductPriceDto[]
     */
    public array $prices;

    public function __construct(array $prices)
    {
        $this->prices = $prices;
    }

    public static function create(array $prices): ProductPricesDto
    {
        $productPrices = array_map(function ($price) {
            return ProductPriceDto::create(
                $price['priceListId'] ?? null,
                $price['priceNoVat'] ?? null,
                $price['priceWholesale'] ?? null,
                $price['price']
            );
        }, $prices);

        return new self($productPrices);
    }

    public function createFromCollection(Collection $collection,array $syncName): ProductPricesDto
    {
        $productPrices = $collection->map(function ($item) use ($syncName) {
            return ProductPriceDto::createFromModel($item,$syncName);
        })->toArray();

        return new self($productPrices);
    }

    public function toArray(): array
    {
        return array_map(function ($price) {
            return $price->toArray();
        }, $this->prices);
    }
}
