<?php

namespace App\Http\Controllers;
use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        return Professor::all();
    }
 
    public function show($id)
    {
        return Professor::find($id);
    }

    public function store(Request $request) {
        $professor = new Professor($request->all());
        $professor->save();

        return "well done";
    }

    public function update(Request $request, $id)
    {
        $professor = Professor::findOrFail($id);
        $professor->update($request->all());

        return $professor;
    }

    public function delete(Request $request, $id)
    {
        $professor = Professor::findOrFail($id);
        $professor->delete();

        return 204;
    }
}
