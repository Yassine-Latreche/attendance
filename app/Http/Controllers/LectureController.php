<?php

namespace App\Http\Controllers;
use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function index()
    {
        return Lecture::all();
    }
 
    public function show($id)
    {
        return Lecture::find($id);
    }

    public function store(Request $request) {
        $request->merge([
            'date' => date('Y-m-d',strtotime($request->get('date'))),
            'starting' => date('H:i:s',strtotime($request->get('starting'))),
            'ending' => date('H:i:s',strtotime($request->get('ending')))
        ]);
        $lecture = new Lecture($request->all());
        $lecture->save();

        return "well done";
    }

    public function update(Request $request, $id)
    {
        $request->merge([
            'date' => date('Y-m-d',strtotime($request->get('date'))),
            'starting' => date('H:i:s',strtotime($request->get('starting'))),
            'ending' => date('H:i:s',strtotime($request->get('ending')))
        ]);
        $lecture = Lecture::findOrFail($id);
        $lecture->update($request->all());

        return $lecture;
    }

    public function delete(Request $request, $id)
    {
        $lecture = Lecture::findOrFail($id);
        $lecture->delete();

        return 204;
    }
}