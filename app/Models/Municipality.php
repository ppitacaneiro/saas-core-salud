<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $table = 'municipalities';

    protected $fillable = [
        'id',
        'province_id',
        'name',
        'cod_municipality',
        'DC',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
