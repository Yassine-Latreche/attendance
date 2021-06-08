<?php

namespace App\Http\Controllers;
use App\Models\TimeTable;
use App\Models\Section;
use App\Models\Group;
use App\Models\Module;
use App\Models\Professor;
use Illuminate\Http\Request;

use App\Exports\TimeTableExport;
use Maatwebsite\Excel\Facades\Excel;

class TimeTableController extends Controller
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
    
    public function get_lectures($section_Id, $group_Id)
    {
        // Basic DateAndTime data
        date_default_timezone_set('Africa/Algiers');
        $today = strtolower(date('l', time()));
        $time_now = date('H:i');

        // Getting lectures of today
        $nextlecture = [];
        $lastlecture = [];
        $todaylecure = TimeTable::where('day_Of_Week', $today)
            ->where('starting', '<=',  $time_now )
            ->where('ending', '>=',  $time_now )
            ->orWhere('section_Id', $section_Id)
            ->orWhere('group_Id', $group_Id)
            ->get()->first();

        if ($todaylecure == null) {
            $nextlecture = TimeTable::where('day_Of_Week', $today)
            ->where('starting', '>=',  $time_now )
            ->orWhere('section_Id', $section_Id)
            ->orWhere('group_Id', $group_Id)
            ->orderBy("starting")
            ->get()->first();

            $n = 1;
            while ($nextlecture == [] && $n < 8) {
                $nextlecture = TimeTable::where('day_Of_Week',strtolower(date('l',strtotime('+'.$n.' day'))))
                    ->orWhere('section_Id', $section_Id)
                    ->orWhere('group_Id', $group_Id)
                    ->orderBy("starting")
                    ->get()->first();
                $n += 1;
            }
            // dd($n);
            // last lecture
            $lastlecture = TimeTable::where('day_Of_Week', $today)
            ->where('ending', '<=',  $time_now )
            ->orWhere('section_Id', $section_Id)
            ->orWhere('group_Id', $group_Id)
            ->orderBy("starting")
            ->get()->first();

            $l = -1;
            $days = [];
            while ($lastlecture == [] && $l > -8) {
                $lastlecture = TimeTable::where('day_Of_Week',strtolower(date('l',strtotime($l.' day'))))
                    ->orWhere('section_Id', $section_Id)
                    ->orWhere('group_Id', $group_Id)
                    ->orderBy("ending", "desc")
                    ->get()->first();
                $l -= 1;
            }
            // return [$lastlecture, $todaylecure, $nextlecture];

        } else {
            // dd("else");
            // next lecture
            $nextlecture = TimeTable::where('day_Of_Week', $today)
            ->where('starting', '>=',  $time_now )
            ->orWhere('section_Id', $section_Id)
            ->orWhere('group_Id', $group_Id)
            ->orderBy("starting")
            ->get()->first();

            $n = 1;
            while ($nextlecture == "" && $n <8) {
                $nextlecture = TimeTable::where('day_Of_Week',strtolower(date('l',strtotime('+'.$n.' day'))))
                    ->orWhere('section_Id', $section_Id)
                    ->orWhere('group_Id', $group_Id)
                    ->orderBy("starting")
                    ->get()->first();
                    $n += 1;
                }
            
            // last lecture
            $lastlecture = TimeTable::where('day_Of_Week', $today)
            ->where('ending', '<=',  $time_now )
            ->orWhere('section_Id', $section_Id)
            ->orWhere('group_Id', $group_Id)
            ->orderBy("starting")
            ->get()->first();

            $l = -1;
            while ($lastlecture == "" && $l <8) {
                $lastlecture = TimeTable::where('day_Of_Week',strtolower(date('l',strtotime($l.' day'))))
                    ->orWhere('section_Id', $section_Id)
                    ->orWhere('group_Id', $group_Id)
                    ->orderBy("ending", "desc")
                    ->get()->first();
                    $l -= 1;
            }
        }
        $responses = ( ["last" => $lastlecture,
        "now" => $todaylecure,
        "next" => $nextlecture]);
        foreach ($responses as $key => $lecture) {
            if ($lecture != null) {
                try {    if ($lecture->section_Id != null) {
                        $lecture->section = Section::find($lecture->section_Id)->section;
                    }
                    if ($lecture->group_Id != null) {
                        $lecture->group = Group::find($lecture->group_Id)->group;
                    }
                    if ($lecture->module_Id != null) {
                        $lecture->module = Module::find($lecture->module_Id)->module;
                    }
                    if ($lecture->professor_Id != null) {
                        $lecture->professor = Professor::find($lecture->professor_Id)->name;
                    }
                } catch(ModelNotFoundException $e)
                {
                    return ("level/section/group data is wrong, try checking student details and level/section/group\n
                     /section_id: $response->section_Id, /group_id: $response->group_Id");
                }
            }
        }
        return $responses;
    }

    public function export() 
    {
        return Excel::download(new TimeTableExport, 'timetable.xlsx');
    }

}

//TimeTable::where('day_Of_Week',strtolower(date('l',strtotime($l.' day'))))
//->get()->all()