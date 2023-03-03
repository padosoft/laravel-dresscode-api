<?php

namespace Padosoft\LaravelDressCodeApi\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DresscodeRawShippingAddressModel
 * @package Padosoft\LaravelDressCodeApi\Models
 * @property int                     $id
 * @property int                     $order_id
 * @property string                  $businessName
 * @property string                  $name
 * @property string                  $surname
 * @property string                  $email
 * @property string                  $streetName
 * @property string                  $streetNumber
 * @property string                  $city
 * @property string                  $zip
 * @property string                  $state
 * @property string                  $country
 * @property string                  $phone
 * @property string                  $mobile
 * @property string                  $vatNumber
 * @property string                  $taxCode
 * @property string                  $notes
 * @property string                  $created_at
 * @property string                  $updated_at
 * @property DresscodeRawOrdersModel $order
 *
 */
class DresscodeRawShippingAddressModel extends Model
{
    use HasFactory;

    protected $table = 'dresscode_raw_shipping_addresses';

    protected $fillable = [
        'order_id',
        'businessName',
        'name',
        'surname',
        'email',
        'streetName',
        'streetNumber',
        'city',
        'zip',
        'state',
        'country',
        'phone',
        'mobile',
        'vatNumber',
        'taxCode',
        'notes',
    ];

    // Define the relationship with the DresscodeRawOrder model
    public function order()
    {
        return $this->belongsTo(DresscodeRawOrdersModel::class);
    }
}
