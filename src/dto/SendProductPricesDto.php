<?php

namespace Padosoft\LaravelDressCodeApi\dto;

class SendProductPricesDto
{

    public string $id;
    public ProductPricesDto $prices;

    public function __construct(string $id, ProductPricesDto $prices)
    {
        $this->id = $id;
        $this->prices = $prices;
    }

    public static function create(string $id, ProductPricesDto $prices): SendProductPricesDto
    {
        return new self($id, $prices);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'prices' => $this->prices->toArray(),
        ];
    }


}