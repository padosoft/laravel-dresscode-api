<?php

namespace Padosoft\LaravelDressCodeApi\dto;

/**
 *
 */
class SendProductSizesDto extends BaseDto
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
    ): SendProductSizesDto
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
            'id' => ['required', 'string'],
            'sizes' => ['required', 'array'],
            'sizes.*.sizeId' => ['required', 'string'],
            'sizes.*.gtin' => ['required', 'string'],
            'sizes.*.stocks' => ['required', 'array'],
            'sizes.*.stocks.*.stock' => ['required', 'numeric', 'min:0']
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
            'sizes.*.gtin.required' => 'gtin is required',
            'sizes.*.gtin.string' => 'gtin must be a string',
            'sizes.*.stocks.required' => 'stocks is required',
            'sizes.*.stocks.array' => 'stocks must be an array',
            'sizes.*.stocks.*.stock.required' => 'stock is required',
            'sizes.*.stocks.*.stock.numeric' => 'stock must be a number',
            'sizes.*.stocks.*.stock.min' => 'stock must be greater than or equal to 0',
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
        ];
    }

}
