<?php

namespace Padosoft\LaravelDressCodeApi\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DresscodeRawDettagliOrdine extends Model
{
    use HasFactory;

    protected $table = 'dresscode_raw_dettagli_ordine';
    protected $primaryKey = 'id_dettaglio_ordine';

    protected $fillable = [
        'id_ordine',
        'productID',
        'sizeID',
        'soldQuantity',
        'unitPrice',
        'vat',
        'discount',
    ];

    public function ordine()
    {
        return $this->belongsTo(DresscodeRawOrdine::class, 'id_ordine', 'id_ordine');
    }

    public function dettagliSconto()
    {
        return $this->hasMany(DresscodeRawDettagliSconto::class, 'id_dettaglio_ordine', 'id_dettaglio_ordine');
    }
}

