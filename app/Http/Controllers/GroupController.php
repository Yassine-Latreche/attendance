<?php

namespace App\Http\Controllers;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index($level, $section)
    {
        return Group::where('section_Id', $section)->get();
    }
 
    public function show($level, $section, $group)
    {
        return Group::find($group);
    }

    public function store(Request $request, $level, $section) 
    {
        $group = new Group();
        $group->group = $request->get('group');
        $group->section_Id = $section;
        $group->number_of_students = $request->get('number_of_students');
        $group->save();

        return "well done";
    }

    public function update(Request $request, $level, $section, $group_Id)
    {
        $group = Group::findOrFail($group_Id);
        $group->update($request->all());

        return $group;
    }

    public function delete(Request $request, $level, $group_Id)
    {
        $group = Group::findOrFail($group_Id);
        $group->delete();

        return 204;
    }
}
