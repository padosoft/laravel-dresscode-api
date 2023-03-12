<?php

namespace Padosoft\LaravelDressCodeApi\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DresscodeRawIndirizzoSpedizione extends Model
{
    use HasFactory;

    protected $table = 'dresscode_raw_indirizzo_spedizione';
    protected $primaryKey = 'id_indirizzo_spedizione';
    public $timestamps = false;

    protected $fillable = [
        'id_ordine',
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

    public function ordine()
    {
        return $this->belongsTo(DresscodeRawOrdine::class, 'id_ordine', 'id_ordine');
    }
}
