<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $table = 'comunities';

    protected $fillable = [
        'id',
        'name',
    ];

    public function provinces()
    {
        return $this->hasMany(Province::class, 'community_id');
    }
}
