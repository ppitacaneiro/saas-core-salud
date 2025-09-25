<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $fillable = ['name', 'description', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function professionals()
    {
        return $this->hasMany(Professional::class);
    }
}
