<?php

namespace Padosoft\LaravelDressCodeApi;

use Exception;

class ProductsDto
{

    public array $products_ID;
    public array $json;
    public int $chunkSize = 1000;

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
     * @return ProductsDto
     */
    public function setChunkSize(int $chunkSize): ProductsDto
    {
        $this->chunkSize = $chunkSize;
        return $this;
    }

    /**
     * @throws Exception
     */
    public function addProduct(string $product_ID, string $json): ProductsDto
    {
        $this->products_ID[] = $product_ID;
        $this->json[] = $json;
        //se si è raggiunto il chunk size, si invia il chunk
        if (count($this->products_ID) == $this->chunkSize) {
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


}