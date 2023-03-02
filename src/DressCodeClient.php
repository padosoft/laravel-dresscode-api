<?php

namespace Padosoft\LaravelDressCodeApi;

use Padosoft\DressCodeApi\DressCodeClient as DressCodeClientApi;

/**
 *
 */
class DressCodeClient
{
    use DressCodeKeyTrait;
    /**
     * @throws \Exception
     */
    public string $username;
    public string $password;
    public string $hub_key;
    public string $subscription_key;

    public function __construct(?string $username, ?string $password, ?string $hub_key, ?string $subscription_key)
    {
        //se i valori non sono passati nel costruttore li prende dalle config
        $this->username = $username??config('dresscode-api-settings.username',null);
        $this->password = $password??config('dresscode-api-settings.password',null);
        $this->hub_key = $hub_key??config('dresscode-api-settings.hub_key',null);
        $this->subscription_key = $subscription_key??config('dresscode-api-settings.subscription_key',  );
        //lancia un errore se i valori delle config sono null o ''
        if (empty($this->username) || empty($this->password) || empty($this->hub_key) || empty($this->subscription_key)) {
            throw new \Exception('DressCodeClient: username, password, hub_key, subscription_key are required in configuration file or in constructor.');
        }
        //inizializza i valori della chiave per la connessione
        try {
            $this->initKey($this->username, $this->password, $this->hub_key, $this->subscription_key);
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }


    public function uploadProducts(string $products): PostResponse
    {
        try {
            //invia i dati al server
            $response = DressCodeClientApi::create($this->dressCodeKey)->postUpload($this->dressCodeKey->hub_key, $products);
            //recupera lo status code e i dati della risposta
            $statusCode = $response->getStatusCode();
            //recupera i dati della risposta
            $data = json_decode($response->getBody(), true);
            //crea un oggetto PostResponse
            return PostResponse::create($statusCode, $data);
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}