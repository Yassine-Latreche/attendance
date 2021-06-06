<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = ['student_Id', 'lecture_Id', 'generated_qr_code_Id',
    'device_type', 'device_id', 'qr_code_string', 'accepted', 'scanning_time'];

    use HasFactory;
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function session()
    {
        return $this->belongsTo(Lecture::class);
    }
    public function generate_qr_code()
    {
        return $this->belongsTo(GenerateQrCode::class);
    }
}
