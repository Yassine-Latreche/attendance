<?php

namespace App\Http\Controllers;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public static function showspetial($section)
    {
        return Section::find($section);
    }

    //
    
    public static function index($level)
    {
        return Section::where('level_Id', $level)->get();
    }
 
    public static function show($level, $section)
    {
        return Section::find($section);
    }

    public static function store(Request $request, $level) 
    {
        $section = new Section();
        $section->section = $request->get('section');
        $section->level_Id = $level;
        $section->number_of_students = $request->get('number_of_students');
        $section->save();

        return "done";
    }

    public static function update(Request $request, $level, $section_Id)
    {
        $section = Section::findOrFail($section_Id);
        $section->update($request->all());

        return "done";
    }

    public static function delete(Request $request, $level, $section_Id)
    {
        $section = Section::findOrFail($section_Id);
        $section->delete();

        return "done";
    }
}
