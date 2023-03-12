<?php

namespace Padosoft\LaravelDressCodeApi\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DresscodeRawOrdini extends Model
{
    use HasFactory;

    protected $table = 'dresscode_raw_ordini';
    protected $primaryKey = 'id_ordine';

    protected $fillable = [
        'orderID',
        'checkoutDate',
        'clientId',
        'storeId',
        'shippingType',
        'shippingCost',
        'voucher',
        'paymentMethod',
        'administrativeNotes',
        'customerNotes',
        'shippingVector',
        'packagingType',
        'packagingCost',
        'gstCost',
        'donation',
        'giftWrap',
        'giftWrapNote',
        'totalAmount',
    ];

    protected $casts = [
        'checkoutDate' => 'datetime',
        'giftWrap' => 'boolean',
    ];

    public function indirizzoSpedizione()
    {
        return $this->hasOne(DresscodeRawIndirizzoSpedizione::class, 'id_ordine', 'id_ordine');
    }

    public function indirizzoFatturazione()
    {
        return $this->hasOne(DresscodeRawIndirizzoFatturazione::class, 'id_ordine', 'id_ordine');
    }

    public function dettagliOrdine()
    {
        return $this->hasMany(DresscodeRawDettagliOrdine::class, 'id_ordine', 'id_ordine');
    }
}
