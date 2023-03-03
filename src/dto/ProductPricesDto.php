<?php

namespace Padosoft\LaravelDressCodeApi\dto;

class ProductPricesDto
{
    public ?string $priceListId;
    public ?float $priceNoVat;
    public ?float $priceWholesale;
    public float $price;

    public function __construct(?string $priceListId, ?float $priceNoVat, ?float $priceWholesale, float $price)
    {
        $this->priceListId = $priceListId;
        $this->priceNoVat = $priceNoVat;
        $this->priceWholesale = $priceWholesale;
        $this->price = $price;
    }

    public static function create(?string $priceListId, ?float $priceNoVat, ?float $priceWholesale, float $price): ProductPricesDto
    {
        return new self($priceListId, $priceNoVat, $priceWholesale, $price);
    }
}
