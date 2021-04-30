<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['group', 'number_of_students', 'section_Id'];
    
    use HasFactory;
    public function student()
    {
        return $this->hasMany(Student::class);
    }
    public function session()
    {
        return $this->hasMany(Session::class);
    }

    //

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
