<?php

namespace Padosoft\LaravelDressCodeApi\dto;

use Illuminate\Database\Eloquent\Model;

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
        string  $sku,
        string  $seasonId,
        string  $brandId,
        string  $colorId,
        string  $genreId,
        ?string  $brandColorCode,
        ?string  $typeId,
        ?string  $categoryId,
        ?string  $subcategoryId,
        ?string  $sizeTypeId,
        ?string  $collectionTypeId,
        ?bool    $hasWashingtonFlag,
        ?string $productPreSaleEnd,
        ?string $productDeleted,
        ?array   $composition,
        ?float   $weight,
        ?array   $tags
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
        string  $sku,
        string  $seasonId,
        string  $brandId,
        string  $colorId,
        string  $genreId,
        ?string  $brandColorCode,
        ?string  $typeId,
        ?string  $categoryId,
        ?string  $subcategoryId,
        ?string  $sizeTypeId,
        ?string  $collectionTypeId,
        ?bool    $hasWashingtonFlag,
        ?string $productPreSaleEnd,
        ?string $productDeleted,
        ?array   $composition,
        ?float   $weight,
        ?array   $tags
    ): ProductDto
    {
        return new self(
            $brandModelCode,
            $sku,
            $seasonId,
            $brandId,
            $colorId,
            $genreId,
            $brandColorCode,
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

    /**
     * Crea un nuovo oggetto ProductDto a partire da un oggetto Model.
     *
     * @param Model $model L'oggetto Model da cui creare il ProductDto.
     * @return ProductDto Il nuovo oggetto ProductDto.
     *
     * @property string $brandModelCode Il codice del modello del prodotto.
     * @property string $brandColorCode Il codice del colore del prodotto.
     * @property string $sku Il codice SKU del prodotto.
     * @property int $seasonId L'ID della stagione a cui appartiene il prodotto.
     * @property int $brandId L'ID del marchio a cui appartiene il prodotto.
     * @property int $colorId L'ID del colore del prodotto.
     * @property int $genreId L'ID del genere del prodotto.
     * @property int $typeId L'ID del tipo di prodotto.
     * @property int $categoryId L'ID della categoria a cui appartiene il prodotto.
     * @property int $subcategoryId L'ID della sottocategoria a cui appartiene il prodotto.
     * @property int $sizeTypeId L'ID del tipo di taglia del prodotto.
     * @property int $collectionTypeId L'ID del tipo di collezione del prodotto.
     * @property bool $hasWashingtonFlag True se il prodotto ha il flag di Washington, false altrimenti.
     * @property string|null $productPreSaleEnd La data di fine della pre-vendita del prodotto (se presente).
     * @property bool $productDeleted True se il prodotto è stato cancellato, false altrimenti.
     * @property string|null $composition La composizione del prodotto (se presente).
     * @property string|null $weight Il peso del prodotto (se presente).
     * @property array|null $tags Gli eventuali tag associati al prodotto (se presenti).
     */

    public static function createWithModel(Model $model): ProductDto
    {
        return new self(
            $model->brandModelCode,
            $model->sku,
            $model->seasonId,
            $model->brandId,
            $model->colorId,
            $model->genreId,
            $model->brandColorCode,
            $model->typeId,
            $model->categoryId,
            $model->subcategoryId,
            $model->sizeTypeId,
            $model->collectionTypeId,
            $model->hasWashingtonFlag,
            $model->productPreSaleEnd,
            $model->productDeleted,
            $model->composition,
            $model->weight,
            $model->tags
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
