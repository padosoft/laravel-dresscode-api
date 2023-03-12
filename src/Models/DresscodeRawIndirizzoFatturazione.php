<?php

namespace Padosoft\LaravelDressCodeApi\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DresscodeRawIndirizzoFatturazione extends Model
{
    use HasFactory;

    protected $table = 'dresscode_raw_indirizzo_fatturazione';
    protected $primaryKey = 'id_indirizzo_fatturazione';
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
        'officeCode',
    ];

    public function ordine()
    {
        return $this->belongsTo(DresscodeRawOrdine::class, 'id_ordine', 'id_ordine');
    }
}
