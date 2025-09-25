<?php

namespace App\Models\Tenant;

use App\Models\Tenant\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Allergy extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'allergy_name',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
