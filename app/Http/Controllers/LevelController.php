<?php

namespace App\Http\Controllers;
use App\Models\Level;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        return Level::all();
    }
 
    public function show($id)
    {
        return Level::find($id);
    }

    public function store(Request $request) {
        $level = new Level();
        $level->level = $request->get('level');
        $level->number_of_students = $request->get('number_of_students');
        $level->save();

        return "well done";
    }

    public function update(Request $request, $id)
    {
        $level = Level::findOrFail($id);
        $level->update($request->all());

        return $level;
    }

    public function delete(Request $request, $id)
    {
        $level = Level::findOrFail($id);
        $level->delete();

        return 204;
    }
}
