<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillablw = ["name"];

    public function scholars(){
        return $this->belongsToMany(Scholar::class);
    }
}
