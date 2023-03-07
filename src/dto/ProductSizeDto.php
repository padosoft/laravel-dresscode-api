<?php

namespace Padosoft\LaravelDressCodeApi\dto;

use Illuminate\Database\Eloquent\Model;

class ProductSizeDto extends BaseDto
{
    public string $sizeId;
    public ?string $gtin;
    public ?array $stocks;

    public function __construct(string $sizeId, ?string $gtin, ?array $stocks)
    {
        // Aggiungiamo dei controlli sui dati in ingresso
        if (empty(trim($sizeId))) {
            throw new \InvalidArgumentException('Size ID cannot be empty');
        }
        $this->sizeId = $sizeId;
        $this->gtin = $gtin;
        // Aggiungiamo una pulizia dei dati in ingresso
        if ($stocks !== null) {
            $this->stocks = array_map(function ($stock) {
                return ProductStockDto::create(
                    trim($stock['storeId'] ?? ''),
                    (float)$stock['stock']
                );
            }, $stocks);
        } else {
            $this->stocks = null;
        }
        parent::__construct();
    }

    // Aggiungiamo i tipi di dato ai parametri dei metodi
    public static function create(string $sizeId, ?string $gtin, ?array $stocks): ProductSizeDto
    {
        return new self($sizeId, $gtin, $stocks);
    }

    public static function createFromModel(Model $model, array $syncName = []): ProductSizeDto
    {
        return new self(
            self::getRightCol($model, $syncName, 'sizeId'),
            self::getRightCol($model, $syncName, 'gtin'),
            self::getRightCol($model, $syncName, 'stocks')
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'sizeId' => $this->sizeId,
            'gtin' => $this->gtin,
            'stocks' => $this->stocks ? array_map(function ($stock) {
                return $stock->toArray();
            }, $this->stocks) : null,
        ];
    }

    /**
     * @return array
     */
    public function validationRoles(): array
    {
        return [
            'sizeId' => 'required|string',
            'gtin' => 'nullable|string',
            'stocks' => 'nullable|array',
            // Aggiungiamo la validazione del tipo di dato
            'stocks.*.storeId' => 'nullable|string',
            'stocks.*.stock' => 'required|numeric',
        ];
    }

    /**
     * @return array
     */
    public function validationMessages(): array
    {
        return [
            'sizeId.required' => 'Size ID is required',
            'sizeId.string' => 'Size ID must be a string',
            'gtin.string' => 'GTIN must be a string',
            'stocks.array' => 'Stocks must be an array',
            'stocks.*.storeId.string' => 'Store ID must be a string',
            'stocks.*.stock.required' => 'Stock is required',
            'stocks.*.stock.numeric' => 'Stock must be a number',
        ];
    }

    /**
     * @return array
     */
    public function validationAttributes(): array
    {
        return [
            'sizeId' => 'Size ID',
            'gtin' => 'GTIN',
            'stocks' => 'Stocks',
            'stocks.*.storeId' => 'Store ID',
            'stocks.*.stock' => 'Stock',
        ];
    }
}
