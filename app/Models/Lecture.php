<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    
        protected $fillable = ['time_tableId', 'presents'];
    
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

        public function time_table()
        {
            return $this->belongsTo(TimeTable::class);
        }
     
}
