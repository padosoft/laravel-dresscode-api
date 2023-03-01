<?php

namespace Padosoft\LaravelDressCodeApi\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DresscodeRawOrderDiscountModel extends Model
{
    use HasFactory;

    protected $table = 'dresscode_raw_order_discounts';

    protected $fillable = [
        'order_detail_id',
        'discountType',
        'discountLabel',
        'discountValue'
    ];

    // Define the relationship with the DresscodeRawOrderDetail model
    public function orderDetail()
    {
        return $this->belongsTo(DresscodeRawOrderDetailsModel::class, 'order_detail_id');
    }
}
