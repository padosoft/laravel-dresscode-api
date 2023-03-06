<?php

namespace Padosoft\LaravelDressCodeApi\dto;

use Illuminate\Database\Eloquent\Model;

class ProductSizeWithPriceDto extends BaseDto
{
    public string $sizeId;
    public ?string $gtin;
    public ?array $stocks;
    public ?array $prices;

    public function __construct(string $sizeId, ?string $gtin, ?array $stocks, ?array $prices)
    {
        $this->sizeId = $sizeId;
        $this->gtin = $gtin;
        $this->stocks = $stocks ? array_map(function ($stock) {
            return ProductStockDto::create(
                $stock['storeId'] ?? null,
                $stock['stock']
            );
        }, $stocks) : null;
        $this->prices = $prices ? array_map(function ($price) {
            return ProductPriceDto::create(
                $price['priceListId'] ?? null,
                $price['priceNoVat'] ?? null,
                $price['priceWholesale'] ?? null,
                $price['price']
            );
        }, $prices) : null;
        parent::__construct();
    }

    public static function create(string $sizeId, ?string $gtin, ?array $stocks, ?array $prices): ProductSizeWithPriceDto
    {
        return new self($sizeId, $gtin, $stocks, $prices);
    }

    public static function createFromModel(Model $model, array $syncName = []): ProductSizeWithPriceDto
    {
        return new self(
            self::getRightCol($model, $syncName, 'sizeId'),
            self::getRightCol($model, $syncName, 'gtin'),
            self::getRightCol($model, $syncName, 'stocks'),
            self::getRightCol($model, $syncName, 'prices')
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
            'prices' => $this->prices ? array_map(function ($price) {
                return $price->toArray();
            }, $this->prices) : null,
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
            'stocks.*.storeId' => 'nullable|string',
            'stocks.*.stock' => 'required|numeric',
            'prices' => 'nullable|array',
            'prices.*.priceListId' => 'nullable|string',
            'prices.*.priceNoVat' => 'nullable|numeric',
            'prices.*.priceWholesale' => 'nullable|numeric',
            'prices.*.price' => 'required|numeric',
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
            'prices.array' => 'Prices must be an array',
            'prices.*.priceListId.string' => 'Price list ID must be a string',
            'prices.*.priceNoVat.numeric' => 'Price no VAT must be a number',
            'prices.*.priceWholesale.numeric' => 'Price wholesale must be a number',
            'prices.*.price.required' => 'Price is required',
            'prices.*.price.numeric' => 'Price must be a number',
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
            'prices' => 'Prices',
            'prices.*.priceListId' => 'Price list ID',
            'prices.*.priceNoVat' => 'Price no VAT',
            'prices.*.priceWholesale' => 'Price wholesale',
            'prices.*.price' => 'Price',
        ];
    }
}
