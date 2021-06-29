<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecture;

class SummaryController extends Controller
{
    public function index(Request $request) {
        $l = Lecture::find($request->all()['lecture_Id']);
        $l->update(array('ended' => '1'));

        $data = ['lecture_Id' => $request->all()['lecture_Id'] ];
        return view('summary',
            $data);
    }
}
