<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gatepass extends Model
{
    protected $fillable = [
        'gatepass_number',
        'school_year_id',
        'vehicle_id',
        'applicant_person_id',
        'status',
        'approved_by',
        'approved_at',
        'valid_from',
        'valid_until',
        'remarks',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
        'valid_from' => 'date',
        'valid_until' => 'date',
    ];

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function applicant()
    {
        return $this->belongsTo(Person::class, 'applicant_person_id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function files()
    {
        return $this->hasMany(GatepassFile::class);
    }

    public function violations()
    {
        return $this->hasMany(Violation::class);
    }
}
