<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'school_id',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
