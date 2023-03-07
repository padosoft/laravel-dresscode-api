<?php

namespace Padosoft\LaravelDressCodeApi;

use Exception;
use Padosoft\LaravelDressCodeApi\dto\SendProductCompleteDto;
use Padosoft\LaravelDressCodeApi\dto\ProductDto;
use Padosoft\LaravelDressCodeApi\ViewModel\ProductJsonViewModel;

class ProductsSenderService
{

    public array $products_ID;
    public array $json;
    public int $chunkSize = 0;

    public string $typeSender = 'products';


    public function __construct()
    {
        $this->products_ID = [];
        $this->json = [];
        $this->chunkSize = config('dresscode-api-settings.chunkSize',0);
    }

    /**
     * @return int
     */
    public function getChunkSize(): int
    {
        return $this->chunkSize;
    }

    /**
     * @param int $chunkSize
     *
     * @return ProductsSenderService
     */
    public function setChunkSize(int $chunkSize): ProductsSenderService
    {
        $this->chunkSize = $chunkSize;
        return $this;
    }

    /**
     * @throws Exception
     */
    public function addProduct(string $product_ID, SendProductCompleteDto $productContainerDto): ProductsSenderService
    {
        $json = $this->createJsonFromProductDto($productContainerDto);
        $this->products_ID[] = $product_ID;
        $this->json[] = $json;
        //se si è raggiunto il chunk size, si invia il chunk
        if ($this->chunkSize!==0 && count($this->products_ID) === $this->chunkSize) {
            $this->sendChunk();
        }
        return $this;
    }

    /**
     * @throws Exception
     */
    public function sendChunk(): void
    {
        $service = app(UploadProductsService::class);
        $service->execute($this);
        $this->products_ID = [];
        $this->json = [];
    }

    public function execute(): void
    {
        $service = app(UploadProductsService::class);
        $service->execute($this);
    }

    public function createJsonFromProductDto(SendProductCompleteDto $productDto): string
    {
        $service = app(ProductJsonViewModel::class);
        return $service->render($productDto, $this->typeSender);
    }


}