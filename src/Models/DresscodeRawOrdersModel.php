<?php

namespace Padosoft\LaravelDressCodeApi\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DresscodeRawOrdersModel extends Model
{
    use HasFactory;

    protected $table = 'dresscode_raw_orders';

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
        'is_error',
        'note_error'
    ];

    // Define the relationship with the DresscodeRawShippingAddress model
    public function shippingAddresses()
    {
        return $this->hasMany(DresscodeRawShippingAddressModel::class);
    }

    // Define the relationship with the DresscodeRawBillingAddress model
    public function billingAddresses()
    {
        return $this->hasMany(DresscodeRawBillingShippingAddressModel::class);
    }

    // Define the relationship with the DresscodeRawOrderDetail model
    public function orderDetails()
    {
        return $this->hasMany(DresscodeRawOrderDetailsModel::class);
    }
}
