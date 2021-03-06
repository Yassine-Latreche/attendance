<?php

namespace App\Http\Controllers;
use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public static function index()
    {
        return Professor::all();
    }
 
    public static function show($id)
    {
        return Professor::find($id);
    }

    public static function store(Request $request) {
        $professor = new Professor($request->all());
        $professor->save();

        return "done";
    }

    public static function update(Request $request, $id)
    {
        $professor = Professor::findOrFail($id);
        $professor->update($request->all());

        return "done";
    }

    public static function delete(Request $request, $id)
    {
        $professor = Professor::findOrFail($id);
        $professor->delete();

        return "done";
    }
}
