<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'plate_number',
        'vehicle_type',
        'brand',
        'model',
        'color',
        'status',
    ];

    public function people()
    {
        return $this->belongsToMany(Person::class, 'vehicle_people')
            ->withPivot('role', 'is_active')
            ->withTimestamps();
    }

    public function owner()
    {
        return $this->belongsToMany(Person::class, 'vehicle_people')
            ->wherePivot('role', 'owner')
            ->wherePivot('is_active', true)
            ->withPivot('role', 'is_active')
            ->withTimestamps();
    }

    public function guardians()
    {
        return $this->belongsToMany(Person::class, 'vehicle_people')
            ->wherePivot('role', 'guardian')
            ->wherePivot('is_active', true)
            ->withPivot('role', 'is_active')
            ->withTimestamps();
    }

    public function drivers()
    {
        return $this->belongsToMany(Person::class, 'vehicle_people')
            ->wherePivot('role', 'driver')
            ->wherePivot('is_active', true)
            ->withPivot('role', 'is_active')
            ->withTimestamps();
    }

    public function gatepasses()
    {
        return $this->hasMany(Gatepass::class);
    }

    public function violations()
    {
        return $this->hasMany(Violation::class);
    }
}
