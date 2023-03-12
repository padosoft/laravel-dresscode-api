<?php

namespace Padosoft\LaravelDressCodeApi\dto;

/**
 *
 */
class SendProductSizesPricesDto extends BaseDto
{

    /**
     * @var array
     */
    public array $data;


    public function __construct(
        array $data
    )
    {
        $this->data = $data;
        parent::__construct();
    }

    /**
     * @param string $data
     *
     * @return ProductV3Dto
     * @throws \Exception
     */
    public static function create(
        array $data,
    ): SendProductSizesPricesDto
    {
        return new self(
            $data
        );
    }

    /**
     * @return array
     */


    public function toArray(): array
    {
        return $this->data;
    }

    /**
     * @return array[]
     */
    public function validationRoles(): array
    {
        return [
            'id' => 'required|string',
            'sizes' => 'required|array',
            'sizes.*.sizeId' => 'required|string',
            'sizes.*.gtin' => 'nullable|string',
            'sizes.*.stocks' => 'required|array',
            'sizes.*.stocks.*.stock' => 'required|numeric|min:0',
            'sizes.*.prices' => 'required|array',
            'sizes.*.prices.*.priceListId' => 'nullable|string',
            'sizes.*.prices.*.priceNoVat' => 'required|numeric|min:0',
            'sizes.*.prices.*.priceWholesale' => 'required|numeric|min:0',
            'sizes.*.prices.*.price' => 'required|numeric|min:0',
        ];

    }

    /**
     * @return string[]
     */
    public function validationMessages(): array
    {
        return [
            'id.required' => 'id is required',
            'id.string' => 'id must be a string',
            'sizes.required' => 'sizes is required',
            'sizes.array' => 'sizes must be an array',
            'sizes.*.sizeId.required' => 'sizeId is required',
            'sizes.*.sizeId.string' => 'sizeId must be a string',
            'sizes.*.gtin.string' => 'gtin must be a string',
            'sizes.*.stocks.required' => 'stocks is required',
            'sizes.*.stocks.array' => 'stocks must be an array',
            'sizes.*.stocks.*.stock.required' => 'stock is required',
            'sizes.*.stocks.*.stock.numeric' => 'stock must be a number',
            'sizes.*.stocks.*.stock.min' => 'stock must be at least 0',
            'sizes.*.prices.required' => 'prices is required',
            'sizes.*.prices.array' => 'prices must be an array',
            'sizes.*.prices.*.priceListId.string' => 'priceListId must be a string',
            'sizes.*.prices.*.priceNoVat.required' => 'priceNoVat is required',
            'sizes.*.prices.*.priceNoVat.numeric' => 'priceNoVat must be a number',
            'sizes.*.prices.*.priceNoVat.min' => 'priceNoVat must be at least 0',
            'sizes.*.prices.*.priceWholesale.required' => 'priceWholesale is required',
            'sizes.*.prices.*.priceWholesale.numeric' => 'priceWholesale must be a number',
            'sizes.*.prices.*.priceWholesale.min' => 'priceWholesale must be at least 0',
            'sizes.*.prices.*.price.required' => 'price is required',
            'sizes.*.prices.*.price.numeric' => 'price must be a number',
            'sizes.*.prices.*.price.min' => 'price must be at least 0',
        ];
    }

    /**
     * @return string[]
     */
    public function validationAttributes(): array
    {
        return [
            'id' => 'id',
            'sizes' => 'sizes',
            'sizes.*.sizeId' => 'sizeId',
            'sizes.*.gtin' => 'gtin',
            'sizes.*.stocks' => 'stocks',
            'sizes.*.stocks.*.stock' => 'stock',
            'sizes.*.prices' => 'prices',
            'sizes.*.prices.*.priceListId' => 'priceListId',
            'sizes.*.prices.*.priceNoVat' => 'priceNoVat',
            'sizes.*.prices.*.priceWholesale' => 'priceWholesale',
            'sizes.*.prices.*.price' => 'price',
        ];
    }

}
