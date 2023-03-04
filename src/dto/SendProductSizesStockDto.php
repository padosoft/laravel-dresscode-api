<?php

namespace Padosoft\LaravelDressCodeApi\dto;

class SendProductSizesStockDto
{

    public string $id;
    public ProductPricesDto $prices;
    public ProductSizesDto $sizes;

    public function __construct(string $id, ProductSizesDto $sizes)
    {
        $this->id = $id;
        $this->sizes = $sizes;
    }

    public static function create(string $id, ProductSizesDto $sizes): SendProductSizesStockDto
    {
        return new self($id, $sizes);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'sizes' => $this->sizes->toArray()
        ];
    }


}