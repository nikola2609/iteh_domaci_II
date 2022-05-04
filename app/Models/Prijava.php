<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prijava extends Model
{
    use HasFactory;
    protected $guarded=[''];

    public function ispit(){
        return $this->belongsTo(Ispit::class);
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }
}
