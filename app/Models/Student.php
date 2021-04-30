<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'level_Id', 'section_Id',
    'group_Id', 'email', 'birthday', 'phone_number',
    'living_area', 'willaya_d_origine', 'device_type', 'device_id'];

    use HasFactory;
    public function record()
    {
        return $this->hasMany(Record::class);
    }

    //

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
