<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name',
        'address',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
