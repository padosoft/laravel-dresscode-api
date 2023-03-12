<?php

namespace Padosoft\LaravelDressCodeApi\dto;

/**
 *
 */
class SendProductPricesDto extends BaseDto
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
    ): SendProductPricesDto
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
            'prices' => 'required|array',
            'prices.*.priceListId' => 'nullable|string',
            'prices.*.priceNoVat' => 'required|numeric|min:0',
            'prices.*.priceWholesale' => 'required|numeric|min:0',
            'prices.*.price' => 'required|numeric|min:0',
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
            'prices.required' => 'prices is required',
            'prices.array' => 'prices must be an array',
            'prices.*.priceListId.nullable' => 'priceListId must be a string',
            'prices.*.priceNoVat.required' => 'priceNoVat is required',
            'prices.*.priceNoVat.numeric' => 'priceNoVat must be a number',
            'prices.*.priceNoVat.min' => 'priceNoVat must be greater than or equal to 0',
            'prices.*.priceWholesale.required' => 'priceWholesale is required',
            'prices.*.priceWholesale.numeric' => 'priceWholesale must be a number',
            'prices.*.priceWholesale.min' => 'priceWholesale must be greater than or equal to 0',
            'prices.*.price.required' => 'price is required',
            'prices.*.price.numeric' => 'price must be a number',
            'prices.*.price.min' => 'price must be greater than or equal to 0',
        ];
    }

    /**
     * @return string[]
     */
    public function validationAttributes(): array
    {
        return [
            'id' => 'id',
            'prices' => 'prices',
            'prices.*.priceListId' => 'priceListId',
            'prices.*.priceNoVat' => 'priceNoVat',
            'prices.*.priceWholesale' => 'priceWholesale',
            'prices.*.price' => 'price',
        ];
    }

}
