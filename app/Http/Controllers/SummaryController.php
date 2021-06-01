<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function index(Request $request) {
        $data = ['lecture_Id' => $request->all()['lecture_Id'] ];
        return view('summary',
            $data);
    }
    // public function index(Request $request) {
    //     $lecture_Id = LectureController::store($request->all()['timetable'], 0);
    //     $data = ['lecture_Id' => $lecture_Id];
    //     return view('QRcodepage',
    //         $data);
    // }
}
