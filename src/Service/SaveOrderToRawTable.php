<?php

namespace Padosoft\LaravelDressCodeApi\Service;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Padosoft\LaravelDressCodeApi\Email\EmailAlertImportOrder;
use Padosoft\LaravelDressCodeApi\Models\DresscodeRawDettagliOrdine;
use Padosoft\LaravelDressCodeApi\Models\DresscodeRawDettagliSconto;
use Padosoft\LaravelDressCodeApi\Models\DresscodeRawIndirizzoFatturazione;
use Padosoft\LaravelDressCodeApi\Models\DresscodeRawIndirizzoSpedizione;
use Padosoft\LaravelDressCodeApi\Models\DresscodeRawOrdini;

class SaveOrderToRawTable
{
    /**
     * @throws \Exception
     */
    public function execute(string $json): DresscodeRawOrdini
    {
        DB::beginTransaction();
        $jsonData = json_decode($json, true);
        //Validazione dei dati


        try {
            $validation = Validator::make($jsonData, $this->validateRoles())->validate();
            // Salva l'ordine
            $order = new DresscodeRawOrdini($jsonData);
            $order->save();

            // Salva l'indirizzo di spedizione
            $shippingAddress = new DresscodeRawIndirizzoSpedizione($jsonData['shippingAddress']);
            $order->indirizzoSpedizione()->save($shippingAddress);

            // Salva l'indirizzo di fatturazione
            $billingAddress = new DresscodeRawIndirizzoFatturazione($jsonData['billingAddress']);
            $order->indirizzoFatturazione()->save($billingAddress);

            // Salva i dettagli dell'ordine e i relativi sconti
            foreach ($jsonData['details'] as $detail) {
                $dettaglioOrdine = new DresscodeRawDettagliOrdine($detail);
                $order->dettagliOrdine()->save($dettaglioOrdine);

                foreach ($detail['discountDetails'] as $discount) {
                    $dettaglioSconto = new DresscodeRawDettagliSconto($discount);
                    $dettaglioOrdine->dettagliSconto()->save($dettaglioSconto);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            EmailAlertImportOrder::sendErrorEmail($jsonData, $e);
            throw $e;
        }
        return $order;
    }

    public function validateRoles()
    {
        return [
            'orderID' => 'required|integer',
            'checkoutDate' => 'nullable|date',
            'clientId' => 'required',
            'storeId' => 'nullable|string',
            'sourceName' => 'nullable|string',
            'priceListId' => 'nullable|string',
            'storeOrderId' => 'nullable|string',
            'shippingType' => 'nullable|string',
            'shippingCost' => 'nullable|numeric',
            'voucher' => 'nullable|numeric',
            'paymentMethod' => 'nullable|string',
            'administrativeNotes' => 'nullable|string',
            'customerNotes' => 'nullable|string',
            'shippingVector' => 'nullable|string',
            'packagingType' => 'nullable|string',
            'packagingCost' => 'nullable|numeric',
            'gstCost' => 'nullable|numeric',
            'donation' => 'nullable|numeric',
            'giftWrap' => 'nullable|boolean',
            'giftWrapNote' => 'nullable|string',
            'totalAmount' => 'nullable|numeric',
            'shippingAddress.businessName' => 'nullable|string',
            'shippingAddress.name' => 'nullable|string',
            'shippingAddress.surname' => 'nullable|string',
            'shippingAddress.email' => 'nullable|email',
            'shippingAddress.streetName' => 'nullable|string',
            'shippingAddress.streetNumber' => 'nullable|string',
            'shippingAddress.city' => 'nullable|string',
            'shippingAddress.zip' => 'nullable|string',
            'shippingAddress.state' => 'nullable|string',
            'shippingAddress.country' => 'nullable|string',
            'shippingAddress.phone' => 'nullable|string',
            'shippingAddress.mobile' => 'nullable|string',
            'shippingAddress.vatNumber' => 'nullable|string',
            'shippingAddress.taxCode' => 'nullable|string',
            'shippingAddress.notes' => 'nullable|string',
            'billingAddress.businessName' => 'nullable|string',
            'billingAddress.name' => 'nullable|string',
            'billingAddress.surname' => 'nullable|string',
            'billingAddress.email' => 'nullable|email',
            'billingAddress.streetName' => 'nullable|string',
            'billingAddress.streetNumber' => 'nullable|string',
            'billingAddress.city' => 'nullable|string',
            'billingAddress.zip' => 'nullable|string',
            'billingAddress.state' => 'nullable|string',
            'billingAddress.country' => 'nullable|string',
            'billingAddress.phone' => 'nullable|string',
            'billingAddress.mobile' => 'nullable|string',
            'billingAddress.vatNumber' => 'nullable|string',
            'billingAddress.taxCode' => 'nullable|string',
            'billingAddress.notes' => 'nullable|string',
            'billingAddress.officeCode' => 'nullable|string',
            'details.*.productID' => 'nullable|string',
            'details.*.sizeID' => 'nullable|string',
            'details.*.soldQuantity' => 'nullable|integer',
            'details.*.unitPrice' => 'nullable|numeric',
            'details.*.vat' => 'nullable|numeric',
            'details.*.discount' => 'nullable|numeric',
            'details.*.discountDetails.*.discountType' => 'nullable|string',
            'details.*.discountDetails.*.discountLabel' => 'nullable|string',
            'details.*.discountDetails.*.discountValue' => 'nullable|numeric'
        ];

    }


}