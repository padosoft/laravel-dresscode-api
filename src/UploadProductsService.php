<?php

namespace Padosoft\LaravelDressCodeApi;

use Exception;
use Padosoft\DressCodeApi\DressCodeClient as DressCodeClientApi;

class UploadProductsService extends DressCodeClientService
{
    /**
     * @param ProductsDto $products
     * return PostResponse
     * invia i dati al server
     * recupera lo status code e i dati della risposta
     * recupera i dati della risposta
     * crea un oggetto PostResponse
     * lancia un errore se la risposta non è valida
     *
     * @return PostResponse
     * @throws Exception
     */
    public function execute(ProductsDto $products): PostResponse
    {
        try {
            //invia i dati al server
            $response = DressCodeClientApi::create($this->dressCodeKey)->postUpload($this->dressCodeKey->hub_key, $products->json);
            //recupera lo status code e i dati della risposta
            $statusCode = $response->getStatusCode();
            //recupera i dati della risposta
            $data = json_decode($response->getBody(), true);
            $this->logProductsSend($products);
            //crea un oggetto PostResponse
            return PostResponse::create($statusCode, $data);
        } catch (Exception $e) {
            $this->logProductsSend($products, false);
            throw new Exception($e->getMessage());
        }
    }

}