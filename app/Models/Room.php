<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['room', 'number_of_places', 'empty', 'place', 'type'];

    use HasFactory;

    public function session()
    {
        return $this->hasMany(Session::class);
    }
}
