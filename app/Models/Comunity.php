<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comunity extends Model
{
    protected $table = 'comunities';

    protected $fillable = [
        'id',
        'name',
    ];

    public function provinces()
    {
        return $this->hasMany(Province::class, 'comunity_id');
    }
}
