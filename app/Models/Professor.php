<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable = ['name', 'email', 'phone_number'];

    use HasFactory;
    public function session()
    {
        return $this->hasMany(Lecture::class);
    }
}
