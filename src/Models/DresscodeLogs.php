<?php

namespace Padosoft\LaravelDressCodeApi\Models;

use Illuminate\Database\Eloquent\Model;

class DresscodeLogs extends Model
{
    protected $table = 'dresscode_logs';

    protected $fillable = [
        'type', 'method', 'route', 'zip', 'data', 'ip_address',
    ];

    protected $casts = [
        'zip' => 'boolean',
    ];
}

