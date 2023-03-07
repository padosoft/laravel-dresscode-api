<?php

namespace Padosoft\LaravelDressCodeApi\dto;

class SendProductSizesPricesDto
{

    public string $id;
    public ProductPricesDto $prices;
    public ProductSizesWithPricesDto $sizes;

    public function __construct(string $id, ProductPricesDto $prices, ProductSizesWithPricesDto $sizes)
    {
        $this->id = $id;
        $this->prices = $prices;
        $this->sizes = $sizes;
    }

    public static function create(string $id, ProductPricesDto $prices, ProductSizesWithPricesDto $sizes): SendProductSizesPricesDto
    {
        return new self($id, $prices, $sizes);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'prices' => $this->prices->toArray(),
            'sizes' => $this->sizes->toArray()
        ];
    }


}