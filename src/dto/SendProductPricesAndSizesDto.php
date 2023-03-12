<?php

namespace Padosoft\LaravelDressCodeApi\dto;

/**
 *
 */
class SendProductPricesAndSizesDto extends BaseDto
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
    ): SendProductPricesAndSizesDto
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
            'sizes' => 'required|array',
            'sizes.*.sizeId' => 'required|string',
            'sizes.*.gtin' => 'nullable|string',
            'sizes.*.stocks' => 'required|array',
            'sizes.*.stocks.*.stock' => 'required|numeric|min:0',
        ];

    }

    /**
     * @return string[]
     */
    public function validationMessages(): array
    {
        return [
            'id.required' => 'Il campo :attribute è obbligatorio.',
            'id.string' => 'Il campo :attribute deve essere una stringa.',
            'prices.required' => 'Il campo :attribute è obbligatorio.',
            'prices.array' => 'Il campo :attribute deve essere un array.',
            'prices.*.priceListId.string' => 'Il campo :attribute deve essere una stringa.',
            'prices.*.priceNoVat.required' => 'Il campo :attribute è obbligatorio.',
            'prices.*.priceNoVat.numeric' => 'Il campo :attribute deve essere un numero.',
            'prices.*.priceNoVat.min' => 'Il campo :attribute deve essere maggiore o uguale a 0.',
            'prices.*.priceWholesale.required' => 'Il campo :attribute è obbligatorio.',
            'prices.*.priceWholesale.numeric' => 'Il campo :attribute deve essere un numero.',
            'prices.*.priceWholesale.min' => 'Il campo :attribute deve essere maggiore o uguale a 0.',
            'prices.*.price.required' => 'Il campo :attribute è obbligatorio.',
            'prices.*.price.numeric' => 'Il campo :attribute deve essere un numero.',
            'prices.*.price.min' => 'Il campo :attribute deve essere maggiore o uguale a 0.',
            'sizes.required' => 'Il campo :attribute è obbligatorio.',
            'sizes.array' => 'Il campo :attribute deve essere un array.',
            'sizes.*.sizeId.required' => 'Il campo :attribute è obbligatorio.',
            'sizes.*.sizeId.string' => 'Il campo :attribute deve essere una stringa.',
            'sizes.*.gtin.string' => 'Il campo :attribute deve essere una stringa.',
            'sizes.*.stocks.required' => 'Il campo :attribute è obbligatorio.',
            'sizes.*.stocks.array' => 'Il campo :attribute deve essere un array.',
            'sizes.*.stocks.*.stock.required' => 'Il campo :attribute è obbligatorio.',
            'sizes.*.stocks.*.stock.numeric' => 'Il campo :attribute deve essere un numero.',
            'sizes.*.stocks.*.stock.min' => 'Il campo :attribute deve essere maggiore o uguale a 0.'
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
            'sizes' => 'sizes',
            'sizes.*.sizeId' => 'sizeId',
            'sizes.*.gtin' => 'gtin',
            'sizes.*.stocks' => 'stocks',
            'sizes.*.stocks.*.stock' => 'stock',
        ];
    }

}
