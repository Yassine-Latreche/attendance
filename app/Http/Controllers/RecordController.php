<?php

namespace App\Http\Controllers;
use App\Models\Record;
use App\Models\Student;
use App\Models\Group;
use App\Models\Section;
use App\Models\GeneratedQrCode;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index()
    {
        return Record::all();
    }
 
    public function show($id)
    {
        return Record::find($id);
    }

    public function store(Request $request) {
        $answer = new Record($request->all());
        $generated_qr_code = GeneratedQrCode::where('lecture_Id', $request->get('lecture_Id'))
            ->where('qr_code_string', $request->get('qr_code_string'))->first();
        if ($generated_qr_code  == "") {
            $answer->generated_qr_code_Id = $generated_qr_code->id;
            $answer->accepted = "rejected";
            $answer->save();
            return "rejected";
        } else {
            $answer->generated_qr_code_Id = $generated_qr_code->id;
        }
        $diff = $request->scanning_time - strtotime($generated_qr_code->created_at);
        if ($diff > 5){
            $answer->accepted = "rejected";
            $answer->save();
            return "rejected";
        }
        $std_id = $request->student_Id;
        if (!(Student::find($std_id)->device_type == $request->device_type || 
            Student::find($std_id)->device_id == $request->device_id)) {
                $answer->accepted = "rejected";
                $answer->save();
                return "rejected";
        }
        $answer->accepted = "accepted";
        $answer->save();
        return "accepted";
        
        // return $answer;
    }

/*     public function update(Request $request, $id)
    {
        $request->merge([
            'scanning_time' => date('H:i:s',strtotime($request->get('scanning_time'))),
            'sending_time' => date('H:i:s',strtotime($request->get('sending_time')))
        ]);
        $record = Record::findOrFail($id);
        $record->update($request->all());

        return $record;
    }

    public function delete(Request $request, $id)
    {
        $record = Record::findOrFail($id);
        $record->delete();

        return 204;
    } */

    public function findByLecture(Request $request)
    {
        $response = Record::where('lecture_Id', $request->get('lecture_Id'))->get();
        if ($response  == "") {
            return "0";
        } else {
            try
            {   
                foreach ($response as $value) {
                    $value->group = Group::findOrFail(Student::findOrFail($value->student_Id)->group_Id)->group;
                    $value->student = Student::findOrFail($value->student_Id)->name;
                    $value->section = Section::findOrFail(Student::find($value->student_Id)->section_Id)->section;
                }
                return $response;
            }
            catch(ModelNotFoundException $e)
            {
                return ("level/section/group data is wrong, try checking student details and level/section/group\n
                level_id: $response->level_Id, /section_id: $response->section_Id, /group_id: $response->group_Id");
            }
        }
    }
}
