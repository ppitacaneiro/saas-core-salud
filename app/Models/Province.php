<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';

    protected $fillable = [
        'id',
        'name',
        'comunity_id',
    ];

    public function community()
    {
        return $this->belongsTo(Community::class, 'comunity_id');
    }

    public function municipalities()
    {
        return $this->hasMany(Municipality::class, 'province_id');
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class, 'province_id');
    }
}
