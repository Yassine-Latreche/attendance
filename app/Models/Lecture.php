<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    
        protected $fillable = ['professor_Id', 'is_in_group', 'group_Id',
        'is_in_section', 'section_Id', 'lecture_type', 'date',
        'starting', 'ending'];
    
        use HasFactory;
        public function record()
        {
            return $this->hasMany(Record::class);
        }
        public function generate_qr_code()
        {
            return $this->hasMany(GeneratedQrCode::class);
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
    
}
