<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    protected $fillable = [
        'gatepass_id',
        'person_id',
        'vehicle_id',
        'violation_type',
        'notes',
        'severity',
        'recorded_by',
        'occurred_at',
    ];

    protected $casts = [
        'occurred_at' => 'datetime',
    ];

    public function gatepass()
    {
        return $this->belongsTo(Gatepass::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function recorder()
    {
        return $this->belongsTo(User::class, 'recorded_by');
    }
}
