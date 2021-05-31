<?php

namespace App\Http\Controllers;
use App\Models\ManuallyAddedStudents;
use Illuminate\Http\Request;

class ManuallyAddedStudentsController extends Controller
{
    public function index()
    {
        return ManuallyAddedStudents::all();
    }
 
    public function show($manuallyAddedStudents)
    {
        return ManuallyAddedStudents::find($manuallyAddedStudents);
    }

    public function store(Request $request) {
        $manuallyAddedStudents = new ManuallyAddedStudents($request->all());
        $manuallyAddedStudents->save();

        return "well done";
    }

    public function update(Request $request, $manuallyAddedStudents)
    {
        $manuallyAddedStudents = ManuallyAddedStudents::findOrFail($manuallyAddedStudents);
        $manuallyAddedStudents->update($request->all());

        return $manuallyAddedStudents;
    }

    public function delete(Request $request, $manuallyAddedStudents)
    {
        $manuallyAddedStudents = ManuallyAddedStudents::findOrFail($manuallyAddedStudents);
        $timanuallyAddedStudentsmetable->delete();

        return 204;
    }
}
