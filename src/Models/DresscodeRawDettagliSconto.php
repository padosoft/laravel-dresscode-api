<?php

namespace Padosoft\LaravelDressCodeApi\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DresscodeRawDettagliSconto extends Model
{
    use HasFactory;

    protected $table = 'dresscode_raw_dettagli_sconto';
    protected $primaryKey = 'id_dettaglio_sconto';
    public $timestamps = false;

    protected $fillable = [
        'id_dettaglio_ordine',
        'discountType',
        'discountLabel',
        'discountValue',
    ];

    public function dettaglioOrdine()
    {
        return $this->belongsTo(DresscodeRawDettagliOrdine::class, 'id_dettaglio_ordine', 'id_dettaglio_ordine');
    }
}
