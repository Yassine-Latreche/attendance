<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\Record;
use App\Models\Group;
use App\Models\Section;
use App\Models\Level;
use App\Models\Lecture;
use App\Models\Module;
use App\Models\Professor;

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

    private $month;
    private $from;
    private $to;

    private $lectures;
    private $daytes;
    private $lect_Ids;
    // function __construct(Request $request) {
    function __construct() {
        setlocale (LC_TIME, 'fr_FR.utf8','fra'); 

        $request = [];
        if ($request->get('group_Id') != "") {
            $this->groupOrSection = true;
            $this->group_Id = $request->get('group_Id');
        }
        if ($request->get('section_Id') != "") {
            $this->groupOrSection = false;
            $this->section_Id = $request->get('section_Id');
        }
        $this->professor_Id = $request->get('professor_Id');
        $this->module_Id = $request->get('module_Id');
        $this->month = $request->get('month');

        $this->from = date('2021-05-01');
        $this->to = date('2021-07-02');


        $this->lectures = Lecture::whereBetween('created_at', [$this->from, $this->to])->get(['id', 'created_at'])->toArray();
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
    }

    public function headings(): array
    {
        return $this->daytes;
    }

    public function array(): array
    {
        $response = [];
        $students = Student::where('email', 'ya.latreche@esi-sba.dz')->get(['name', 'id'])->toArray();
        foreach ($students as $key => $std) {
            $tmp = [];
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
                        } else {
                            array_push($tmp, "P");
                        }
                    }
                }
            }
            array_push($response, $tmp);
        }
        return $response;
    }
}
