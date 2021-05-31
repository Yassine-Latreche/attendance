<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;
    protected $table = 'time_tables';

    protected $fillable = ['module_Id','professor_Id', 'level_Id', 'is_in_group', 'group_Id',
    'is_in_section', 'section_Id', 'lecture_Type', 'day_Of_Week',
    'starting', 'ending'];
    public function lecture()
    {
        return $this->hasMany(Lecture::class);
    }

    //

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
