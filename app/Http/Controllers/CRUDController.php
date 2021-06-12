<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CRUDController extends Controller
{
    /* ---- MODULE ---- */
    public function moduleIndex(Request $request) 
    {
        $rows = ModuleController::index()->toArray();
        return view('crud/module/index', ['rows'=> $rows]);
    }

    public function moduleStore(Request $request) 
    {
        $store = ModuleController::store($request);
        if ($store == 'done') {
            return back()->with('success','Item created successfully!');
        } else {
            return back()->with('error','Item was not inserted!');
        }
    }

    public function moduleEdit(Request $request, $module_Id) 
    {
        $data = ModuleController::show($module_Id)->toArray();
        return view('crud/module/edit', ['data'=> $data]);
    }

    public function moduleUpdate(Request $request) 
    {
        $update = ModuleController::update($request, $request->get('id'));
        if ($update == 'done') {
            return redirect()->route('moduleIndex')->with('success','Item edited successfully!');
        } else {
            return redirect()->route('moduleIndex')->with('error','Item was not edited!');
        }
    }

    public function moduleDelete(Request $request, $module_Id) 
    {
        $delete = ModuleController::delete($request, $module_Id);
        if ($delete == 'done') {
            return redirect()->route('moduleIndex')->with('success','Item deleted successfully!');
        } else {
            return redirect()->route('moduleIndex')->with('error','Item was not deleted!');
        }
    }

    /* ---- LEVEL ---- */
    public function levelIndex(Request $request) 
    {
        $rows = LevelController::index()->toArray();
        return view('crud/level/index', ['rows'=> $rows]);
    }

    public function levelStore(Request $request) 
    {
        $store = LevelController::store($request);
        if ($store == 'done') {
            return back()->with('success','Item created successfully!');
        } else {
            return back()->with('error','Item was not inserted!');
        }
    }

    public function levelEdit(Request $request, $level_Id) 
    {
        $data = LevelController::show($level_Id)->toArray();
        return view('crud/level/edit', ['data'=> $data]);
    }

    public function levelUpdate(Request $request) 
    {
        $update = LevelController::update($request, $request->get('id'));
        if ($update == 'done') {
            return redirect()->route('levelIndex')->with('success','Item edited successfully!');
        } else {
            return redirect()->route('levelIndex')->with('error','Item was not edited!');
        }
    }

    public function levelDelete(Request $request, $level_Id) 
    {
        $delete = LevelController::delete($request, $level_Id);
        if ($delete == 'done') {
            return redirect()->route('levelIndex')->with('success','Item deleted successfully!');
        } else {
            return redirect()->route('levelIndex')->with('error','Item was not deleted!');
        }
    }

    /* ---- SECTION ---- */
    public function sectionIndex(Request $request, $level_Id) 
    {
        $rows = SectionController::index($level_Id)->toArray();
        return view('crud/section/index', ['rows'=> $rows]);
    }

    public function sectionStore(Request $request, $level_Id) 
    {
        $store = SectionController::store($request, $level_Id);
        if ($store == 'done') {
            return back()->with('success','Item created successfully!');
        } else {
            return back()->with('error','Item was not inserted!');
        }
    }

    public function sectionEdit(Request $request, $level_Id, $section_Id) 
    {
        $data = SectionController::show($level_Id, $section_Id)->toArray();
        return view('crud/section/edit', ['data'=> $data]);
    }

    public function sectionUpdate(Request $request, $level_Id) 
    {
        $update = SectionController::update($request, $level_Id, $request->get('id'));
        if ($update == 'done') {
            return redirect()->route('sectionIndex', $level_Id)->with('success','Item edited successfully!');
        } else {
            return redirect()->route('sectionIndex', $level_Id)->with('error','Item was not edited!');
        }
    }

    public function sectionDelete(Request $request, $level_Id, $section_Id) 
    {
        $delete = SectionController::delete($request, $level_Id, $section_Id);
        if ($delete == 'done') {
            return redirect()->route('sectionIndex', $level_Id)->with('success','Item deleted successfully!');
        } else {
            return redirect()->route('sectionIndex', $level_Id)->with('error','Item was not deleted!');
        }
    }

    /* ---- GROUP ---- */
    public function groupIndex(Request $request, $level_Id, $section_Id) 
    {
        $rows = GroupController::index($level_Id, $section_Id)->toArray();
        $finalrows = [];
        foreach ($rows as $key => $value) {
            $value['level_Id'] = $level_Id;
            $finalrows[$key] = $value;
        }
        return view('crud/group/index', ['rows'=> $finalrows]);
    }

    public function groupStore(Request $request, $level_Id, $section_Id) 
    {
        $store = GroupController::store($request, $level_Id, $section_Id);
        if ($store == 'done') {
            return back()->with('success','Item created successfully!');
        } else {
            return back()->with('error','Item was not inserted!');
        }
    }

    public function groupEdit(Request $request, $level_Id, $section_Id, $group_Id) 
    {
        $data = GroupController::show($level_Id, $section_Id, $group_Id)->toArray();
        $data['level_Id'] = $level_Id;
        return view('crud/group/edit', ['data'=> $data]);
    }

    public function groupUpdate(Request $request, $level_Id, $section_Id) 
    {
        $update = GroupController::update($request, $level_Id, $section_Id, $request->get('id'));
        if ($update == 'done') {
            return redirect()->route('groupIndex', [$level_Id, $section_Id])->with('success','Item edited successfully!');
        } else {
            return redirect()->route('groupIndex', [$level_Id, $section_Id])->with('error','Item was not edited!');
        }
    }

    public function groupDelete(Request $request, $level_Id, $section_Id, $group_Id) 
    {
        $delete = GroupController::delete($request, $level_Id, $section_Id, $group_Id);
        if ($delete == 'done') {
            return redirect()->route('groupIndex', [$level_Id, $section_Id])->with('success','Item deleted successfully!');
        } else {
            return redirect()->route('groupIndex', [$level_Id, $section_Id])->with('error','Item was not deleted!');
        }
    }

    /* ---- PROFESSOR ---- */
    public function professorIndex(Request $request) 
    {
        $rows = ProfessorController::index()->toArray();
        return view('crud/professor/index', ['rows'=> $rows]);
    }

    public function professorStore(Request $request) 
    {

        $store = ProfessorController::store($request);
        if ($store == 'done') {
            return back()->with('success','Item created successfully!');
        } else {
            return back()->with('error','Item was not inserted!');
        }
    }

    public function professorEdit(Request $request, $professor_Id) 
    {
        $data = ProfessorController::show($professor_Id)->toArray();
        return view('crud/professor/edit', ['data'=> $data]);
    }

    public function professorUpdate(Request $request) 
    {
        $update = ProfessorController::update($request, $request->get('id'));
        if ($update == 'done') {
            return redirect()->route('professorIndex')->with('success','Item edited successfully!');
        } else {
            return redirect()->route('professorIndex')->with('error','Item was not edited!');
        }
    }

    public function professorDelete(Request $request, $professor_Id) 
    {
        $delete = ProfessorController::delete($request, $professor_Id);
        if ($delete == 'done') {
            return redirect()->route('professorIndex')->with('success','Item deleted successfully!');
        } else {
            return redirect()->route('professorIndex')->with('error','Item was not deleted!');
        }
    }

    /* ---- TIMETABLE ---- */
    public function timetableIndex(Request $request) 
    {
        $rows = TimeTableController::index()->toArray();
        $finalrows = [];
        foreach ($rows as $key => $value) {
            $value['avec'] = LevelController::show($value['level_Id'])->level . ' Année | ';
            if ($value['is_In_Group'] == '1') {
                $grp = GroupController::showspetial($value['group_Id']);
                $value['avec'] .= 'Section: ' . GroupController::showspetial($grp->section_Id)->section . ' | ';
                $value['avec'] .= 'Group: ' . $grp->group;
            } else {
                $value['avec'] .= 'Section: ' . SectionController::showspetial($value['section_Id'])->section;
            }
            $value['module'] = ModuleController::show($value['module_Id'])->module;
            $value['professor'] = ProfessorController::show($value['professor_Id'])->name;
            $finalrows[$key] = $value;
        }
        return view('crud/timetable/index', ['rows'=> $finalrows]);
    }

    public function timetableStore(Request $request) 
    {

        $store = TimeTableController::store($request);
        if ($store == 'done') {
            return back()->with('success','Item created successfully!');
        } else {
            return back()->with('error','Item was not inserted!');
        }
    }

    public function timetableEdit(Request $request, $timetable_Id) 
    {
        $data = TimeTableController::show($timetable_Id)->toArray();
        return view('crud/timetable/edit', ['data'=> $data]);
    }

    public function timetableUpdate(Request $request) 
    {
        $update = TimeTableController::update($request, $request->get('id'));
        if ($update == 'done') {
            return redirect()->route('timetableIndex')->with('success','Item edited successfully!');
        } else {
            return redirect()->route('timetableIndex')->with('error','Item was not edited!');
        }
    }

    public function timetableDelete(Request $request, $timetable_Id) 
    {
        $delete = TimeTableController::delete($request, $timetable_Id);
        if ($delete == 'done') {
            return redirect()->route('timetableIndex')->with('success','Item deleted successfully!');
        } else {
            return redirect()->route('timetableIndex')->with('error','Item was not deleted!');
        }
    }
}
