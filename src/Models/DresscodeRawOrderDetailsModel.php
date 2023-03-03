<?php

namespace Padosoft\LaravelDressCodeApi\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int                              $id
 * @property int                              $order_id
 * @property string                           $productID
 * @property string                           $sizeID
 * @property int                              $soldQuantity
 * @property float                            $unitPrice
 * @property float                            $vat
 * @property float                            $discount
 * @property string                           $created_at
 * @property string                           $updated_at
 * @property DresscodeRawOrdersModel          $order
 * @property DresscodeRawOrderDiscountModel[] $discounts
 */
class DresscodeRawOrderDetailsModel extends Model
{
    use HasFactory;

    protected $table = 'dresscode_raw_order_details';

    protected $fillable = [
        'order_id',
        'productID',
        'sizeID',
        'soldQuantity',
        'unitPrice',
        'vat',
        'discount',
    ];

    // Define the relationship with the DresscodeRawOrder model
    public function order()
    {
        return $this->belongsTo(DresscodeRawOrdersModel::class);
    }

    // Define the relationship with the DresscodeRawOrderDiscount model
    public function discounts()
    {
        return $this->hasMany(DresscodeRawOrderDiscountModel::class, 'order_detail_id');
    }
}
