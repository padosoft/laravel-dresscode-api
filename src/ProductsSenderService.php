<?php

namespace Padosoft\LaravelDressCodeApi;

use Exception;

class ProductsSenderService
{
    public array $products_ID;
    public array $data;
    public int $chunkSize = 50;
    public bool $testMode = true;

    public string $typeSender = 'products';


    public function __construct()
    {
        $this->products_ID = [];
        $this->data = [];
        $this->chunkSize = config('dresscode-api-settings.chunkSize', 0);
        $this->testMode = config('dresscode-api-settings.testMode', true);
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
    public function addProduct(string $product_ID, array $data): ProductsSenderService
    {

        $json = json_encode($data);
        $this->products_ID[] = $product_ID;
        $this->data[] = $data;
        //se si è raggiunto il chunk size, si invia il chunk
        if ($this->chunkSize !== 0 && count($this->products_ID) === $this->chunkSize) {
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
        $service->execute($this, $this->testMode);
        $this->products_ID = [];
        $this->data = [];
    }

    public function execute(): void
    {
        $service = app(UploadProductsService::class);
        $service->execute($this, $this->testMode);
    }
}
