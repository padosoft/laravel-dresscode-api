<?php

namespace Padosoft\LaravelDressCodeApi\dto;

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

    public function createFromCollection(Collection $collection): ProductPricesDto
    {
        $productPrices = $collection->map(function ($item) {
            return ProductPriceDto::createFromModel($item);
        })->toArray();

        return new self($productPrices);
    }
}
