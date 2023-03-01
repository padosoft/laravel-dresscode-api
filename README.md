## Configurazione per Dresscode

Questa sezione descrive la configurazione necessaria per l'integrazione con Dresscode.

La configurazione deve essere inserita nel file `config/dresscode.php`. Ecco un esempio di configurazione:

```php
<?php

/**
 * Configurazione per l'integrazione con Dresscode
 */

return [
    // L'username per accedere all'API di Dresscode, letto dall'ambiente
    'username' => env('DRESSCODE_USERNAME', ''),
    
    // La password per accedere all'API di Dresscode, letta dall'ambiente
    'password' => env('DRESSCODE_PASSWORD',''),
    
    // La chiave per accedere all'hub di Dresscode, letta dall'ambiente
    'hub_key' => env('DRESSCODE_HUB_KEY',''),
    
    // La chiave di sottoscrizione per accedere all'API di Dresscode, letta dall'ambiente
    'subscription_key' => env('DRESSCODE_SUBSCRIPTION_KEY',''),
];
```
Per utilizzare la configurazione, è possibile accedere ai valori delle chiavi usando la sintassi $config['nome_chiave'], dove $config è l'array di configurazione restituito dalla funzione di configurazione di Laravel.

Ad esempio, per accedere all'username, è possibile usare il seguente codice:

```php
$username = $config['username'];
```