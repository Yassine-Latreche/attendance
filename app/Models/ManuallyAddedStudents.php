<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManuallyAddedStudents extends Model
{
    use HasFactory;
    protected $fillable = ['lecture_Id', 'student_Id'];
}
