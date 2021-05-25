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

    public static function store($time_tableId, $presents = 0) {
        $lecture = new Lecture();
        $lecture->time_tableId = $time_tableId;
        $lecture->presents = $presents;
        $lecture->save();

        return $lecture->id;
    }

    public function update(Request $request, $id)
    {
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