<?php

namespace App\Models\Tenant;

use App\Models\Province;
use App\Models\Municipality;
use App\Models\Tenant\Medication;
use App\Models\Tenant\Allergy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'document_type',
        'document_number',
        'date_of_birth',
        'gender',
        'email',
        'phone',
        'address',
        'province_id',
        'municipality_id',
        'postal_code',
        'notes',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function allergies()
    {
        return $this->hasMany(Allergy::class);
    }

    public function medications()
    {
        return $this->hasMany(Medication::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
