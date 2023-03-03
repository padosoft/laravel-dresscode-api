<?php

namespace Padosoft\LaravelDressCodeApi;

use Exception;
use Padosoft\DressCodeApi\DressCodeClient as DressCodeClientApi;

/**
 *
 */
class DressCodeClientService
{
    use DressCodeKeyTrait;

    /**
     * @throws Exception
     */
    public string $username;
    public string $password;
    public string $hub_key;
    public string $subscription_key;

    /**
     * @param string|null $username
     * @param string|null $password
     * @param string|null $hub_key
     * @param string|null $subscription_key
     *
     * @throws Exception
     * DressCodeClient constructor.
     * se i valori non sono passati nel costruttore li prende dalle config
     * lancia un errore se i valori delle config sono null o ''
     * inizializza i valori della chiave per la connessione
     * se la chiave non è valida lancia un errore
     * se la chiave è valida la salva in una variabile
     *
     */
    public function __construct(string $username = null, string $password = null, string $hub_key = null, string $subscription_key = null)
    {
        //se i valori non sono passati nel costruttore li prende dalle config
        $this->username = $username ?? config('dresscode-api-settings.username', null);
        $this->password = $password ?? config('dresscode-api-settings.password', null);
        $this->hub_key = $hub_key ?? config('dresscode-api-settings.hub_key', null);
        $this->subscription_key = $subscription_key ?? config('dresscode-api-settings.subscription_key',);
        //lancia un errore se i valori delle config sono null o ''
        if (empty($this->username) || empty($this->password) || empty($this->hub_key) || empty($this->subscription_key)) {
            throw new Exception('DressCodeClient: username, password, hub_key, subscription_key are required in configuration file or in constructor.');
        }
        //inizializza i valori della chiave per la connessione
        try {
            $this->initKey($this->username, $this->password, $this->hub_key, $this->subscription_key);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function logProductsSend(ProductsSenderService $products, bool $success = true): void
    {
        //registra il log dei prodotti inviati
        //Compress json data
        //$products->json = gzcompress($products->json);
        //$log = new LogProductsSendService();
        //Invia una notifica con gli errori di invio.
        //$log->execute($products);
    }

}