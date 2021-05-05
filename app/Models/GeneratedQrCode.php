<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneratedQrCode extends Model
{
    protected $fillable = ['lecture_Id', 'qr_code_string'];

    use HasFactory;
    public function session()
    {
        return $this->belongsTo(Lecture::class);
    }
}
