<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'user_id',
        'person_type',
        'id_number',
        'first_name',
        'last_name',
        'middle_name',
        'phone',
        'email',
        'status',
    ];

    protected $casts = [
        'user_id' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'vehicle_people')
            ->withPivot('role', 'is_active')
            ->withTimestamps();
    }

    public function gatepasses()
    {
        return $this->hasMany(Gatepass::class, 'applicant_person_id');
    }

    public function violations()
    {
        return $this->hasMany(Violation::class);
    }
}
