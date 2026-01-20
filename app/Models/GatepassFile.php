<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GatepassFile extends Model
{
    protected $fillable = [
        'gatepass_id',
        'file_type',
        'path',
        'uploaded_by',
        'expires_at',
        'status',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function gatepass()
    {
        return $this->belongsTo(Gatepass::class);
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
