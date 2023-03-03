<?php

namespace Padosoft\LaravelDressCodeApi\dto;

use Padosoft\LaravelDressCodeApi\dto\traits\DtoValidationTraits;

class ProductStockDto extends BaseDto
{
    use DtoValidationTraits;
    public ?string $storeId;
    public int $stock;

    public function __construct(?string $storeId, int $stock)
    {
        $this->storeId = $storeId;
        $this->stock = $stock;
        parent::__construct();
    }

    public static function create(?string $storeId, int $stock): ProductStockDto
    {
        return new self($storeId, $stock);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'storeId' => $this->storeId,
            'stock' => $this->stock,
        ];
    }

    /**
     * @return array
     */
    public function validationRoles(): array
    {
        return [
            'storeId' => 'nullable|string',
            'stock' => 'required|integer',
        ];
    }

    /**
     * @return array
     */
    public function validationMessages(): array
    {
        return [
            'storeId.string' => 'The storeId must be a string.',
            'storeId.nullable' => 'The storeId must be null.',
            'stock.required' => 'The stock is required.',
            'stock.integer' => 'The stock must be an integer.',
        ];
    }

    /**
     * @return array
     */
    public function validationAttributes(): array
    {
        return [
            'storeId' => 'storeId',
            'stock' => 'stock',
        ];
    }
}
