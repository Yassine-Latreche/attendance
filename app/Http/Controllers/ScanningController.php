<?php

namespace App\Http\Controllers;
use App\Models\Lecture;
use Illuminate\Http\Request;

class ScanningController extends Controller
{
    public function index(Request $request) {
        $lecture_Id = LectureController::store($request->all()['timetable'], 0);
        $data = ['lecture_Id' => $lecture_Id];
        return view('QRcodepage',
            $data);
    }
}
