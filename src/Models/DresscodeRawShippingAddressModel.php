<?php

namespace Padosoft\LaravelDressCodeApi\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'notes'
    ];

    // Define the relationship with the DresscodeRawOrder model
    public function order()
    {
        return $this->belongsTo(DresscodeRawOrdersModel::class);
    }
}
