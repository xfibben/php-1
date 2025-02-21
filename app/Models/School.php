<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'direction'];

    public function scholars()
    {
        return $this->hasMany(Scholar::class);
    }
    

}
