<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plans';

    protected $fillable = [
        'type',
        'price',
        'max_users',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'max_users' => 'integer',
    ];

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }
}
