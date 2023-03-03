<?php

namespace Padosoft\LaravelDressCodeApi\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DresscodeRawOrdersModel
 * @package Padosoft\LaravelDressCodeApi\Models
 * @property int    $id
 * @property string $orderID
 * @property string $checkoutDate
 * @property string $clientId
 * @property string $storeId
 * @property string $shippingType
 * @property float  $shippingCost
 * @property string $voucher
 * @property string $paymentMethod
 * @property string $administrativeNotes
 * @property string $customerNotes
 * @property string $shippingVector
 * @property string $packagingType
 * @property float  $packagingCost
 * @property float  $gstCost
 * @property float  $donation
 * @property string $giftWrap
 * @property string $giftWrapNote
 * @property float  $totalAmount
 * @property string $is_error
 * @property string $note_error
 * @property string $created_at
 * @property string $updated_at
 *
 */
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
        'note_error',
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
