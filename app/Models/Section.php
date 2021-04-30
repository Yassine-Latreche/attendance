<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['section', 'number_of_students', 'level_Id'];

    use HasFactory;
    public function student()
    {
        return $this->hasMany(Student::class);
    }
    public function group()
    {
        return $this->hasMany(Group::class);
    }
    public function session()
    {
        return $this->hasMany(Session::class);
    }

    //

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_Id', 'id');
    }
}
