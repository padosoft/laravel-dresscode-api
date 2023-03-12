<?php

namespace Padosoft\LaravelDressCodeApi\Email;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class EmailAlertImportOrder
{
    public static function sendErrorEmail(array $orderData, Throwable $exception)
    {
        $email = config('dresscode-api-settings.emailForAlert', null);

        $validator = \Illuminate\Support\Facades\Validator::make(
            ['email' => $email],
            ['email' => 'required|email']
        );
        if ($validator->fails()) {
            Log::error('Email non valida per l\'invio delle email di alert');
            return;
        }


        $subject = 'Errore importazione ordine '. $orderData['orderID']??'Id Sconosciuto' . ' - DressCode - ' . config('app.name', 'Laravel') . '';
        $body = 'Si è verificato un errore durante l\'importazione dell\'ordine con i seguenti dati:' . PHP_EOL . PHP_EOL;
        Log::alert('Si è verificato un errore durante l\'importazione dell\'ordine '.$orderData['orderID']??'Id Sconosciuto');

        // Aggiungi i dati dell'ordine al corpo dell'email
        foreach ($orderData as $key => $value) {
            if (is_array($value)) {
                $value = json_encode($value);
            }

            $body .= $key . ': ' . $value . PHP_EOL;
        }

        $body .= PHP_EOL . 'Messaggio di errore:' . PHP_EOL . $exception->getMessage();

        // Invia l'email all'amministratore
        Mail::raw($body, function ($message) use ($email, $subject) {
            $message->to($email);
            $message->subject($subject);
        });
    }
}