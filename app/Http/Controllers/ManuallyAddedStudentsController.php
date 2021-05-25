<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManuallyAddedStudentsController extends Controller
{
    public function index()
    {
        return TimeTable::all();
    }
 
    public function show($timetable)
    {
        return TimeTable::find($timetable);
    }

    public function store(Request $request) {
        $request->merge([
            'starting' => date('H:i:s',strtotime($request->get('starting'))),
            'ending' => date('H:i:s',strtotime($request->get('ending')))
        ]);
        $timetable = new TimeTable($request->all());
        $timetable->save();

        return "well done";
    }

    public function update(Request $request, $timetable)
    {
        $request->merge([
            'starting' => date('H:i:s',strtotime($request->get('starting'))),
            'ending' => date('H:i:s',strtotime($request->get('ending')))
        ]);
        $timetable = TimeTable::findOrFail($timetable);
        $timetable->update($request->all());

        return $timetable;
    }

    public function delete(Request $request, $timetable)
    {
        $timetable = TimeTable::findOrFail($timetable);
        $timetable->delete();

        return 204;
    }
}
