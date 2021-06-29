<?php

namespace App\Http\Controllers;
use App\Models\TimeTable;
use App\Models\Section;
use App\Models\Level;
use App\Models\Group;
use App\Models\Module;
use App\Models\Professor;
use Illuminate\Http\Request;

use App\Exports\TimeTableExport;
use Maatwebsite\Excel\Facades\Excel;

class TimeTableController extends Controller
{
    public static function index()
    {
        return TimeTable::all();
    }
 
    public static function indexProfessor($professor_Id)
    {
        return TimeTable::where('professor_Id', $professor_Id)->get();
    }

    public static function show($timetable)
    {
        return TimeTable::find($timetable);
    }

    public static function store(Request $request) {
        $request->merge([
            'starting' => date('H:i:s',strtotime($request->get('starting'))),
            'ending' => date('H:i:s',strtotime($request->get('ending')))
        ]);
        $timetable = new TimeTable($request->all());
        $timetable->save();

        return "done";
    }

    public static function update(Request $request, $timetable)
    {
        $request->merge([
            'starting' => date('H:i:s',strtotime($request->get('starting'))),
            'ending' => date('H:i:s',strtotime($request->get('ending')))
        ]);
        $timetable = TimeTable::findOrFail($timetable);
        $timetable->update($request->all());

        return "done";
    }

    public static function delete(Request $request, $timetable)
    {
        $timetable = TimeTable::findOrFail($timetable);
        $timetable->delete();

        return "done";
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

    public function get_lectures($section_Id, $group_Id)
    {
        // Basic DateAndTime data
        date_default_timezone_set('Africa/Algiers');
        $today = strtolower(date('l', time()));
        $time_now = date('H:i');

        // Getting lectures of today
        $nextlecture = [];
        $lastlecture = [];
        $todaylecture = $this->sectionOrGroup(
            TimeTable::where('day_Of_Week', $today)
            ->where('starting', '<=',  $time_now )
            ->where('ending', '>=',  $time_now ),
            $section_Id,
            $group_Id
        );
        // dd($todaylecture);
        if ($todaylecture == null) {
            $nextlecture = $this->sectionOrGroup(
                TimeTable::where('day_Of_Week', $today)
            ->where('starting', '>=',  $time_now )
            ->orderBy("starting"),
            $section_Id,
            $group_Id
            );
            $n = 1;
            while ($nextlecture == [] && $n < 8) {
                $nextlecture = $this->sectionOrGroup(
                    TimeTable::where('day_Of_Week',strtolower(date('l',strtotime('+'.$n.' day'))))
                    ->orderBy("starting"),
                    $section_Id,
                    $group_Id
                );
                $n += 1;
            }
            // last lecture
            $lastlecture = $this->sectionOrGroup(
                TimeTable::where('day_Of_Week', $today)
                ->where('ending', '<=',  $time_now )
                ->orderBy("starting"),
                $section_Id,
                $group_Id
            );
            $l = -1;
            $days = [];
            while ($lastlecture == [] && $l > -8) {
                $lastlecture = $this->sectionOrGroup(
                    TimeTable::where('day_Of_Week',strtolower(date('l',strtotime($l.' day'))))
                    ->orderBy("ending", "desc"),
                    $section_Id,
                    $group_Id
                );
                $l -= 1;
            }
            // return [$lastlecture, $todaylecture, $nextlecture];

        } else {
            // dd("else");
            // next lecture
            $nextlecture = $this->sectionOrGroup(
                TimeTable::where('day_Of_Week', $today)
                ->where('starting', '>=',  $time_now )
                ->orderBy("starting"),
                $section_Id,
                $group_Id
            );
            $n = 1;
            while ($nextlecture == "" && $n <8) {
                $nextlecture = $this->sectionOrGroup(
                    TimeTable::where('day_Of_Week',strtolower(date('l',strtotime('+'.$n.' day'))))
                    ->orderBy("starting"),
                    $section_Id,
                    $group_Id
                );
                $n += 1;
            }
            
            // last lecture
            $lastlecture = $this->sectionOrGroup(
                TimeTable::where('day_Of_Week', $today)
                ->where('ending', '<=',  $time_now )
                ->orderBy("starting"),
                $section_Id,
                $group_Id
            );

            $l = -1;
            while ($lastlecture == "" && $l <8) {
                $lastlecture = $this->sectionOrGroup(
                    TimeTable::where('day_Of_Week',strtolower(date('l',strtotime($l.' day'))))
                    ->orderBy("ending", "desc"),
                    $section_Id,
                    $group_Id
                );
                $l -= 1;
            }
        }
        $responses = ( ["last" => $lastlecture,
        "now" => $todaylecture,
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

    public function get_lectures_professor($professor_Id) {
        date_default_timezone_set('Africa/Algiers');
        $today = strtolower(date('l', time()));
        $time_now = date('H:i');

        // Getting lectures of today
        $nextlecture = [];
        $lastlecture = [];
        $todaylecture =  TimeTable::where('day_Of_Week', $today)
        ->where('starting', '<=',  $time_now )
        ->where('ending', '>=',  $time_now )
        ->where('professor_Id', $professor_Id)
        ->get()->first();
        if ($todaylecture == null) {
            $nextlecture = TimeTable::where('day_Of_Week', $today)
            ->where('starting', '>=',  $time_now )
            ->orderBy("starting")
            ->where('professor_Id', $professor_Id)
            ->get()->first();
            $n = 1;
            while ($nextlecture == [] && $n < 8) {
                $nextlecture = TimeTable::where('day_Of_Week',strtolower(date('l',strtotime('+'.$n.' day'))))
                    ->orderBy("starting")
                    ->where('professor_Id', $professor_Id)
                    ->get()->first();
                $n += 1;
            }
            // last lecture
            $lastlecture = TimeTable::where('day_Of_Week', $today)
                ->where('ending', '<=',  $time_now )
                ->orderBy("starting")
                ->where('professor_Id', $professor_Id)
                ->get()->first();
            $l = -1;
            $days = [];
            while ($lastlecture == [] && $l > -8) {
                $lastlecture = TimeTable::where('day_Of_Week',strtolower(date('l',strtotime($l.' day'))))
                    ->orderBy("ending", "desc")
                    ->where('professor_Id', $professor_Id)
                    ->get()->first();
                $l -= 1;
            }

        } else {
            // next lecture
            $nextlecture = TimeTable::where('day_Of_Week', $today)
                ->where('starting', '>=',  $time_now )
                ->orderBy("starting")
                ->where('professor_Id', $professor_Id)
                ->get()->first();
            $n = 1;
            while ($nextlecture == "" && $n <8) {
                $nextlecture = TimeTable::where('day_Of_Week',strtolower(date('l',strtotime('+'.$n.' day'))))
                    ->orderBy("starting")
                    ->where('professor_Id', $professor_Id)
                    ->get()->first();
                $n += 1;
            }
            
            // last lecture
            $lastlecture = TimeTable::where('day_Of_Week', $today)
                ->where('ending', '<=',  $time_now )
                ->orderBy("starting")
                ->where('professor_Id', $professor_Id)
                ->get()->first();

            $l = -1;
            while ($lastlecture == "" && $l <8) {
                $lastlecture = TimeTable::where('day_Of_Week',strtolower(date('l',strtotime($l.' day'))))
                    ->orderBy("ending", "desc")
                    ->where('professor_Id', $professor_Id)
                    ->get()->first();
                $l -= 1;
            }
        }
        $responses = ( ["last" => $lastlecture,
        "now" => $todaylecture,
        "next" => $nextlecture]);
        foreach ($responses as $key => $lecture) {
            if ($lecture != null) {
                try {    if ($lecture->section_Id != null) {
                        $lecture->section = Section::find($lecture->section_Id)->section;
                    }
                    if ($lecture->group_Id != null) {
                        $lecture->group = Group::find($lecture->group_Id)->group;
                    }
                    if ($lecture->level_Id != null) {
                        $lecture->level = Level::find($lecture->level_Id)->level;
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