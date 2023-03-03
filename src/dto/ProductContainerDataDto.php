<?php

namespace Padosoft\LaravelDressCodeApi\dto;

class ProductContainerDataDto
{

    public string $id;
    public ProductDto $product;
    public ProductPricesDto $prices;
    public ProductSizesDto $sizes;
    public ProductLanguagesDto $languages;
    public ProductPhotosDto $photos;

    public function __construct(string $id, ProductDto $product, ProductPricesDto $prices, ProductSizesDto $sizes, ProductLanguagesDto $languages, ProductPhotosDto $photos)
    {
        $this->id = $id;
        $this->product = $product;
        $this->prices = $prices;
        $this->sizes = $sizes;
        $this->languages = $languages;
        $this->photos = $photos;
    }

    public static function create(string $id, ProductDto $product, ProductPricesDto $prices, ProductSizesDto $sizes, ProductLanguagesDto $languages, ProductPhotosDto $photos): ProductContainerDataDto
    {
        return new self($id, $product, $prices, $sizes, $languages, $photos);
    }


}