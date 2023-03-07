<?php

namespace Padosoft\LaravelDressCodeApi\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DresscodeRawOrderDiscountModel
 * @package Padosoft\LaravelDressCodeApi\Models
 * @property int                           $id
 * @property int                           $order_detail_id
 * @property string                        $discountType
 * @property string                        $discountLabel
 * @property float                         $discountValue
 * @property string                        $created_at
 * @property string                        $updated_at
 * @property DresscodeRawOrderDetailsModel $orderDetail
 *
 */
class DresscodeRawOrderDiscountModel extends Model
{
    use HasFactory;

    protected $table = 'dresscode_raw_order_discounts';

    protected $fillable = [
        'order_detail_id',
        'discountType',
        'discountLabel',
        'discountValue',
    ];

    // Define the relationship with the DresscodeRawOrderDetail model
    public function orderDetail()
    {
        return $this->belongsTo(DresscodeRawOrderDetailsModel::class, 'order_detail_id');
    }
}
