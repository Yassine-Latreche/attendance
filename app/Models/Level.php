<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = ['level', 'number_of_students'];

    public function student()
    {
        return $this->hasMany(Student::class);
    }
    public function section()
    {
        return $this->hasMany(Section::class);
    }
}
