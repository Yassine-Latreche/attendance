<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Level;
use App\Models\Group;
use App\Models\Section;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index($level, $section, $group)
    {
        return Student::where('group_Id', $group)->get();
    }
 
    public function show($level, $section, $group, $student)
    {
        return Student::find($student);
    }

    public function store(Request $request, $level, $section, $group) 
    {
        $student = new Student();
        $student->name = $request->get('name');
        $student->level_Id = $level;
        $student->section_Id = $section;
        $student->group_Id = $group;
        $student->email = $request->get('email');
        $student->birthday = date('Y-m-d',strtotime($request->get('birthday')));
        $student->phone_number = $request->get('phone_number');
        $student->living_area = $request->get('living_area');
        $student->willaya_d_origine = $request->get('willaya_d_origine');
        $student->device_type = $request->get('device_type');
        $student->device_id = $request->get('device_id');
        $student->save();

        return "well done";
    }

    public function update(Request $request, $level, $section, $group, $student_Id)
    {
        $request->merge([
            'birthday' => date('Y-m-d',strtotime($request->get('birthday')))
        ]);
        $student = Student::findOrFail($student_Id);
        $student->update($request->all());

        return $student;
    }

    public function delete(Request $request, $level, $group, $student_Id)
    {
        $student = Student::findOrFail($student_Id);
        $student->delete();

        return 204;
    }

    // Custom functions
    public function findByEmail(Request $request)
    {
        $theonewefound = Student::where('email', $request->get('email'))->first();
        $theonewefound->level_Id = Level::findOrFail($theonewefound->level_Id)->level;
/*         $theonewefound->section_Id = Section::findOrFail($theonewefound->section_Id)->section;
        $theonewefound->group_Id = Group::findOrFail($theonewefound->group_Id)->group; */
        return $theonewefound;
    }
}