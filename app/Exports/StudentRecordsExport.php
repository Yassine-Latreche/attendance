<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\Record;
use App\Models\Group;
use App\Models\Section;
use App\Models\Level;
use App\Models\Lecture;
use App\Models\TimeTable;
use App\Models\Module;
use App\Models\Professor;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentRecordsExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $group_Id;
    private $section_Id;
    private $professor_Id;
    private $module_Id;
    private $groupNotSection;

    private $time_tableId;
    private $timeTableObj;

    private $from;
    private $to;

    private $lectures;
    private $daytes;
    private $lect_Ids;
    private $header;

    function __construct(Request $request) {
        setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
        // dd($request->get('group'));

        $this->professor_Id = $request->get('professor');
        $this->module_Id = $request->get('module');

        $this->from = date($request->get('from'));
        $this->to = date($request->get('to'));

        $this->time_tableId = $request->get('timetable');
        $this->timeTableObj = TimeTable::find($this->time_tableId);


        if ($this->timeTableObj->is_In_Group == '1') {
            $this->groupNotSection = true;
            $this->group_Id = $this->timeTableObj->group_Id;
            $this->section_Id = Group::find($this->group_Id)->section_Id;
        }else if ($this->timeTableObj->is_In_Section == '1') {
            $this->groupNotSection = false;
            $this->section_Id = $this->timeTableObj->section_Id;
        }

        $this->lectures = Lecture::whereBetween('created_at', [$this->from, $this->to])
                        ->where('time_tableId', $this->timeTableObj->id)
                        ->get(['id', 'created_at'])->toArray();
        $this->daytes = ['Nom Et Prenom'];
        $this->lect_Ids = [];
        // dd($lectures->get(['id', 'created_at'])->toArray());
        foreach ($this->lectures as $key => $value) {
            foreach ($value as $crt => $datee) {
                if ($crt == "created_at") {
                    array_push($this->daytes, date("j/n/Y",strtotime($datee)));
                } else {
                    array_push($this->lect_Ids,$datee);
                }
            }
        }
        array_push($this->daytes, 'Total des présences', 'Total des absences', 'Pourcentage');
        $this->header = [];
        array_push($this->header,
                ['Module: ', Module::find($this->timeTableObj->module_Id)->module,
                'Année: ', Level::find($this->timeTableObj->level_Id)->level,
                'Section: ', Section::find($this->section_Id)->section,
                'Groupe: ', ($this->groupNotSection ? Group::find($this->group_Id)->group : 'Tous') ]);
        array_push($this->header,
                ['Début: ', $request->get('from'),
                'Fin: ', $request->get('to')]);
        array_push($this->header, $this->daytes);
    }

    public function headings(): array
    {
        return $this->header;
    }

    public function array(): array
    {
        $response = [];
        $students = $this->groupNotSection ? 
                        Student::where('group_Id', $this->group_Id)->get(['name', 'id'])->toArray() 
                        : Student::where('section_Id', $this->section_Id)->get(['name', 'id'])->toArray();
        foreach ($students as $key => $std) {
            $tmp = [];
            $pres = 0;
            $abs = 0;
            foreach ($std as $var => $value) {
                if ($var == "name") {
                    array_push($tmp, $value);
                } else {
                    foreach ($this->lect_Ids as $lect_Id) {
                        $rcrd = Record::where('Student_Id', $value)
                            ->where('lecture_Id', $lect_Id)
                            ->where('accepted', 'accepted')
                            ->get()->toArray();
                        if (count($rcrd) == 0) {
                            array_push($tmp, "A");
                            $abs += 1;
                        } else {
                            array_push($tmp, "P");
                            $pres += 1;
                        }
                    }
                }
            }
            array_push($tmp, strval($pres), strval($abs), strval(round($pres/ count($this->lect_Ids), 4)*100).'%');
            array_push($response, $tmp);
        }
        return $response;
    }
}
