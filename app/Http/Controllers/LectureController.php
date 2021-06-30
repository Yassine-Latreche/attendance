<?php

namespace App\Http\Controllers;
use App\Models\Lecture;
use App\Models\TimeTable;
use App\Models\Section;
use App\Models\Level;
use App\Models\Group;
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

    private function sectionOrGroup($data, $section_Id, $group_Id) {

        $one = new \Illuminate\Database\Eloquent\Builder(clone $data->getQuery());
        $one->setModel($data->getModel());

        $two = new \Illuminate\Database\Eloquent\Builder(clone $data->getQuery());
        $two->setModel($data->getModel());

        $withsec = $one->where('section_Id', $section_Id)->get()->first();
        $withgrp = $two->where('group_Id', $group_Id)->get()->first();
        if ($withsec != null) {
            return $withsec;
        } else if ($withgrp != null) {
            // dd($withgrp);
            return $withgrp;
        } else {
            return null;
        }
    }

    public function lectures_where($lecture_Id)
    {
        $timetable = TimeTable::find(Lecture::find($lecture_Id)->time_tableId);
        if ($timetable->is_In_Group == '1') {
            return (["group" => Group::find($timetable->group_Id)->id]);
        } else {
            return (["section" => Section::find($timetable->section_Id)->id]);
        }
    }
}