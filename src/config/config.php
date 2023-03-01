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
