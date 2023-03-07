<?php

namespace Padosoft\LaravelDressCodeApi\dto;

/**
 *
 */
class ProductV3Dto extends BaseDto
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
    ): ProductV3Dto
    {
        return new self(
            $data
        );
    }

    /**
     * Crea un nuovo oggetto ProductDto a partire da un oggetto Model.
     *
     * @return array Il nuovo oggetto ProductDto.
     *
     * @property string      $brandModelCode    Il codice del modello del prodotto.
     * @property string      $brandColorCode    Il codice del colore del prodotto.
     * @property string      $sku               Il codice SKU del prodotto.
     * @property int         $seasonId          L'ID della stagione a cui appartiene il prodotto.
     * @property int         $brandId           L'ID del marchio a cui appartiene il prodotto.
     * @property int         $colorId           L'ID del colore del prodotto.
     * @property int         $genreId           L'ID del genere del prodotto.
     * @property int         $typeId            L'ID del tipo di prodotto.
     * @property int         $categoryId        L'ID della categoria a cui appartiene il prodotto.
     * @property int         $subcategoryId     L'ID della sottocategoria a cui appartiene il prodotto.
     * @property int         $sizeTypeId        L'ID del tipo di taglia del prodotto.
     * @property int         $collectionTypeId  L'ID del tipo di collezione del prodotto.
     * @property bool        $hasWashingtonFlag True se il prodotto ha il flag di Washington, false altrimenti.
     * @property string|null $productPreSaleEnd La data di fine della pre-vendita del prodotto (se presente).
     * @property bool        $productDeleted    True se il prodotto è stato cancellato, false altrimenti.
     * @property string|null $composition       La composizione del prodotto (se presente).
     * @property string|null $weight            Il peso del prodotto (se presente).
     * @property array|null  $tags              Gli eventuali tag associati al prodotto (se presenti).
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
            'product' => ['required', 'array'],
            'product.*.brandModelCode' => ['required', 'string'],
            'product.*.brandColorCode' => ['string'],
            'product.*.sku' => ['required', 'string'],
            'product.*.seasonId' => ['required', 'string'],
            'product.*.brandId' => ['required', 'string'],
            'product.*.colorId' => ['required', 'string'],
            'product.*.genreId' => ['required', 'string'],
            'product.*.typeId' => ['string'],
            'product.*.categoryId' => ['string'],
            'product.*.subcategoryId' => ['string'],
            'product.*.sizeTypeId' => ['string'],
            'product.*.collectionTypeId' => ['string'],
            'product.*.hasWashingtonFlag' => ['boolean'],
            'product.*.productPreSaleEnd' => ['date'],
            'product.*.productDeleted' => ['date'],
            'product.*.composition' => ['array'],
            'product.*.composition.*.material' => ['required', 'string'],
            'product.*.composition.*.percentage' => ['numeric', 'min:0', 'max:100'],
            'product.*.weight' => ['numeric', 'min:0'],
            'product.*.tags' => ['nullable', 'array'],
            'product.*.tags.*' => ['nullable', 'string'],
            'prices' => ['required', 'array'],
            'prices.*.priceListId' => ['nullable', 'string'],
            'prices.*.priceNoVat' => ['nullable', 'numeric', 'min:0'],
            'prices.*.priceWholesale' => ['nullable', 'numeric', 'min:0'],
            'prices.*.price' => ['required', 'numeric', 'min:0'],
            'sizes' => ['required', 'array'],
            'sizes.*.sizeId' => ['required', 'string'],
            'sizes.*.gtin' => ['nullable', 'string'],
            'sizes.*.stocks' => ['required', 'array'],
            'sizes.*.stocks.*.storeId' => ['nullable', 'string'],
            'sizes.*.stocks.*.stock' => ['required', 'numeric', 'min:0'],
            'sizes.*.prices' => ['nullable', 'array'],
            'sizes.*.prices.*.priceNoVat' => ['nullable', 'numeric', 'min:0'],
            'sizes.*.prices.*.priceWholesale' => ['nullable', 'numeric', 'min:0'],
            'sizes.*.prices.*.price' => ['required_with:sizes.*.prices', 'numeric', 'min:0'],
            'languages' => ['required', 'array'],
            'languages.*.languageId' => ['required', 'string'],
            'languages.*.name' => ['required', 'string'],
            'languages.*.description' => ['string'],
            'languages.*.composition' => ['nullable', 'string'],
            'languages.*.madeIn' => ['nullable', 'string'],
            'languages.*.sizeAndFit' => ['nullable', 'string'],
            'languages.*.notes' => ['nullable', 'string'],
            'languages.*.customData' => ['nullable', 'array'],
            'photos' => ['required', 'array'],
            'photos.*.position' => ['required', 'numeric', 'min:1'],
            'photos.*.url' => ['required', 'url'],
            'photos.*.tag' => ['nullable', 'string'],
        ];

    }

    /**
     * @return string[]
     */
    public function validationMessages(): array
    {
        return [
            'required' => 'Il campo :attribute è obbligatorio.',
            'string' => 'Il campo :attribute deve essere una stringa.',
            'array' => 'Il campo :attribute deve essere un array.',
            'numeric' => 'Il campo :attribute deve essere un numero.',
            'min' => 'Il campo :attribute deve essere almeno :min.',
            'max' => 'Il campo :attribute deve essere al massimo :max.',
            'boolean' => 'Il campo :attribute deve essere vero o falso.',
            'date' => 'Il campo :attribute deve essere una data valida.',
            'url' => 'Il campo :attribute deve essere un URL valido.',
            'composition.*.material.required' => 'Il campo "Materiale" nell\'elemento :item dell\'array "Composizione" del prodotto è obbligatorio.',
            'composition.*.percentage.required' => 'Il campo "Percentuale" nell\'elemento :item dell\'array "Composizione" del prodotto è obbligatorio.',
            'composition.*.percentage.min' => 'Il campo "Percentuale" nell\'elemento :item dell\'array "Composizione" del prodotto deve essere almeno :min.',
            'composition.*.percentage.max' => 'Il campo "Percentuale" nell\'elemento :item dell\'array "Composizione" del prodotto deve essere al massimo :max.',
            'sizes.*.stocks.*.storeId.required' => 'Il campo "Id Negozio" nell\'elemento :item dell\'array "Stocks" della taglia :sizeId del prodotto è obbligatorio.',
            'sizes.*.stocks.*.stock.required' => 'Il campo "Quantità" nell\'elemento :item dell\'array "Stocks" della taglia :sizeId del prodotto è obbligatorio.',
            'sizes.*.stocks.*.stock.min' => 'Il campo "Quantità" nell\'elemento :item dell\'array "Stocks" della taglia :sizeId del prodotto deve essere almeno :min.',
            'sizes.*.prices.*.price.required_with' => 'Il campo "Prezzo" nell\'elemento :item dell\'array "Prices" della taglia :sizeId del prodotto è obbligatorio se è presente l\'array "Prices".',
            'photos.*.position.min' => 'Il campo "Posizione" nell\'elemento :item dell\'array "Photos" del prodotto deve essere almeno :min.',
        ];

    }

    /**
     * @return string[]
     */
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
