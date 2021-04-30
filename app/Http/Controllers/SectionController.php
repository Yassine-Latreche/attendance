<?php

namespace App\Http\Controllers;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index($level)
    {
        return Section::where('level_Id', $level)->get();
    }
 
    public function show($level, $section)
    {
        return Section::find($section);
    }

    public function store(Request $request, $level) 
    {
        $section = new Section();
        $section->section = $request->get('section');
        $section->level_Id = $level;
        $section->number_of_students = $request->get('number_of_students');
        $section->save();

        return "well done";
    }

    public function update(Request $request, $level, $section_Id)
    {
        $section = Section::findOrFail($section_Id);
        $section->update($request->all());

        return $section;
    }

    public function delete(Request $request, $level, $section_Id)
    {
        $section = Section::findOrFail($section_Id);
        $section->delete();

        return 204;
    }
}
