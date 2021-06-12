<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Level;
use App\Models\Group;
use App\Models\Section;
use Illuminate\Http\Request;

use App\Exports\StudentRecordsExport;
use Maatwebsite\Excel\Facades\Excel;

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
        $response = Student::where('email', $request->get('email'))->first();
        dd($response);
        if ($response  == null) {
            return "student not found";
        } else {
            if ($response->initialized == '0') {
                $response->device_type = $request->get('device_type');
                $response->device_id = $request->get('device_id');
                $response->initialized = '1';
                $response->save();
                return $response;
            } else if (!($response->device_type == $request->get('device_type') && $response->device_id == $request->get('device_id'))) {
                return "student not found";
            }
            try
            {
                $response->level = Level::find($response->level_Id)->level;
                $response->section = Section::find($response->section_Id)->section;
                $response->group = Group::find($response->group_Id)->group;
                return $response;
            }
            catch(ModelNotFoundException $e)
            {
                return ("level/section/group data is wrong, try checking student details and level/section/group\n
                level_id: $response->level_Id, /section_id: $response->section_Id, /group_id: $response->group_Id");
            }
        }
    }

    public function exportget(Request $request) 
    {
        return view('export');
    }
    public function export(Request $request) 
    {
        return Excel::download(new StudentRecordsExport($request), 'student.xlsx');
    }

}