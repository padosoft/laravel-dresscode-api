<?php

namespace Padosoft\LaravelDressCodeApi\dto;

class SendProductCompleteDto
{

    public string $id;
    public ProductDto $product;
    public ProductPricesDto $prices;
    public ProductSizesWithPricesDto $sizes;
    public ProductLanguagesDto $languages;
    public ProductPhotosDto $photos;

    public function __construct(string $id, ProductDto $product, ProductPricesDto $prices, ProductSizesWithPricesDto $sizes, ProductLanguagesDto $languages, ProductPhotosDto $photos)
    {
        $this->id = $id;
        $this->product = $product;
        $this->prices = $prices;
        $this->sizes = $sizes;
        $this->languages = $languages;
        $this->photos = $photos;
    }

    public static function create(string $id, ProductDto $product, ProductPricesDto $prices, ProductSizesWithPricesDto $sizes, ProductLanguagesDto $languages, ProductPhotosDto $photos): SendProductCompleteDto
    {
        return new self($id, $product, $prices, $sizes, $languages, $photos);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'product' => $this->product->toArray(),
            'prices' => $this->prices->toArray(),
            'sizes' => $this->sizes->toArray(),
            'languages' => $this->languages->toArray(),
            'photos' => $this->photos->toArray(),
        ];
    }


}