<?php

namespace Padosoft\LaravelDressCodeApi\dto;

class ProductDto
{
    public string $brandModelCode;
    public string $brandColorCode;
    public string $sku;
    public string $seasonId;
    public string $brandId;
    public string $colorId;
    public string $genreId;
    public string $typeId;
    public string $categoryId;
    public string $subcategoryId;
    public string $sizeTypeId;
    public string $collectionTypeId;
    public bool $hasWashingtonFlag;
    public ?string $productPreSaleEnd;
    public ?string $productDeleted;
    public array $composition;
    public float $weight;
    public array $tags;

    public function __construct(
        string  $brandModelCode,
        string  $brandColorCode,
        string  $sku,
        string  $seasonId,
        string  $brandId,
        string  $colorId,
        string  $genreId,
        string  $typeId,
        string  $categoryId,
        string  $subcategoryId,
        string  $sizeTypeId,
        string  $collectionTypeId,
        bool    $hasWashingtonFlag,
        ?string $productPreSaleEnd,
        ?string $productDeleted,
        array   $composition,
        float   $weight,
        array   $tags
    )
    {
        $this->brandModelCode = $brandModelCode;
        $this->brandColorCode = $brandColorCode;
        $this->sku = $sku;
        $this->seasonId = $seasonId;
        $this->brandId = $brandId;
        $this->colorId = $colorId;
        $this->genreId = $genreId;
        $this->typeId = $typeId;
        $this->categoryId = $categoryId;
        $this->subcategoryId = $subcategoryId;
        $this->sizeTypeId = $sizeTypeId;
        $this->collectionTypeId = $collectionTypeId;
        $this->hasWashingtonFlag = $hasWashingtonFlag;
        $this->productPreSaleEnd = $productPreSaleEnd;
        $this->productDeleted = $productDeleted;
        $this->composition = $composition;
        $this->weight = $weight;
        $this->tags = $tags;
    }

    public static function create(
        string  $brandModelCode,
        string  $brandColorCode,
        string  $sku,
        string  $seasonId,
        string  $brandId,
        string  $colorId,
        string  $genreId,
        string  $typeId,
        string  $categoryId,
        string  $subcategoryId,
        string  $sizeTypeId,
        string  $collectionTypeId,
        bool    $hasWashingtonFlag,
        ?string $productPreSaleEnd,
        ?string $productDeleted,
        array   $composition,
        float   $weight,
        array   $tags
    ): ProductDto
    {
        return new self(
            $brandModelCode,
            $brandColorCode,
            $sku,
            $seasonId,
            $brandId,
            $colorId,
            $genreId,
            $typeId,
            $categoryId,
            $subcategoryId,
            $sizeTypeId,
            $collectionTypeId,
            $hasWashingtonFlag,
            $productPreSaleEnd,
            $productDeleted,
            $composition,
            $weight,
            $tags
        );
    }
}
