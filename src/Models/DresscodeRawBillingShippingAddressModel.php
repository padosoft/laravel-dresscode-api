<?php

namespace Padosoft\LaravelDressCodeApi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DresscodeRawBillingShippingAddressModel extends Model
{
    use HasFactory;

    protected $table = 'dresscode_raw_billing_addresses';

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
        'officeCode'
    ];

    // Define the relationship with the DresscodeRawOrder model
    public function order()
    {
        return $this->belongsTo(DresscodeRawOrdersModel::class);
    }
}
