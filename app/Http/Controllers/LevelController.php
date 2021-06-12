<?php

namespace App\Http\Controllers;
use App\Models\Level;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LevelController extends Controller
{
    public static function index()
    {
        return Level::all();
    }
 
    public static function show($id)
    {
        return Level::find($id);
    }

    public static function store(Request $request) {
        $level = new Level();
        $level->level = $request->get('level');
        $level->number_of_students = $request->get('number_of_students');
        $level->save();

        return "done";
    }

    public static function update(Request $request, $id)
    {
        $level = Level::findOrFail($id);
        $level->update($request->all());

        return "done";
    }

    public static function delete(Request $request, $id)
    {
        $level = Level::findOrFail($id);
        $level->delete();

        return "done";
    }
}
