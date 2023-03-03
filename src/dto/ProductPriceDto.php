<?php

namespace Padosoft\LaravelDressCodeApi\dto;

class ProductPriceDto extends BaseDto
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
        parent::__construct();
    }

    public static function create(?string $priceListId, ?float $priceNoVat, ?float $priceWholesale, float $price): ProductPriceDto
    {
        return new self($priceListId, $priceNoVat, $priceWholesale, $price);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'priceListId' => $this->priceListId,
            'priceNoVat' => $this->priceNoVat,
            'priceWholesale' => $this->priceWholesale,
            'price' => $this->price,
        ];
    }

    /**
     * @return array
     */
    public function validationRoles(): array
    {
        return [
            'priceListId' => 'nullable|string',
            'priceNoVat' => 'nullable|numeric',
            'priceWholesale' => 'nullable|numeric',
            'price' => 'required|numeric',
        ];
    }

    /**
     * @return array
     */
    public function validationMessages(): array
    {
        return [
            'price.required' => 'The price is required',
        ];
    }

    /**
     * @return array
     */
    public function validationAttributes(): array
    {
        return [
            'priceListId' => 'Price List Id',
            'priceNoVat' => 'Price No Vat',
            'priceWholesale' => 'Price Wholesale',
            'price' => 'Price',
        ];
    }
}
