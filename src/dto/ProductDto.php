<?php

namespace Padosoft\LaravelDressCodeApi\dto;

class ProductDto extends BaseDto
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
        //constructor parent
        parent::__construct();
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

    public function toArray(): array
    {
        return [
            'brandModelCode' => $this->brandModelCode,
            'brandColorCode' => $this->brandColorCode,
            'sku' => $this->sku,
            'seasonId' => $this->seasonId,
            'brandId' => $this->brandId,
            'colorId' => $this->colorId,
            'genreId' => $this->genreId,
            'typeId' => $this->typeId,
            'categoryId' => $this->categoryId,
            'subcategoryId' => $this->subcategoryId,
            'sizeTypeId' => $this->sizeTypeId,
            'collectionTypeId' => $this->collectionTypeId,
            'hasWashingtonFlag' => $this->hasWashingtonFlag,
            'productPreSaleEnd' => $this->productPreSaleEnd,
            'productDeleted' => $this->productDeleted,
            'composition' => $this->composition,
            'weight' => $this->weight,
            'tags' => $this->tags,
        ];
    }

    public function validationRoles(): array
    {
        return [
            'brandModelCode' => 'required|string',
            'sku' => 'required|string',
            'seasonId' => 'required|string',
            'brandId' => 'required|string',
            'colorId' => 'required|string',
            'genreId' => 'required|string',
        ];
    }

    public function validationMessages(): array
    {
        return [
            'brandModelCode.required' => 'Brand Model Code is required',
            'sku.required' => 'Sku is required',
            'seasonId.required' => 'Season Id is required',
            'brandId.required' => 'Brand Id is required',
            'colorId.required' => 'Color Id is required',
            'genreId.required' => 'Genre Id is required',
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'brandModelCode' => 'Brand Model Code',
            'sku' => 'Sku',
            'seasonId' => 'Season Id',
            'brandId' => 'Brand Id',
            'colorId' => 'Color Id',
            'genreId' => 'Genre Id',
        ];
    }

}
