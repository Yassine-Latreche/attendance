<?php

namespace App\Http\Controllers;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public static function index()
    {
        return Module::all();
    }
 
    public static function show($id)
    {
        return Module::find($id);
    }

    public static function store(Request $request) {
        $module = new Module();
        $module->module = $request->get('module');
        try {
            $module->save();
          } catch (\Illuminate\Database\QueryException $e) {
            return 'error';
          }

        return "done";
    }

    public static function update(Request $request, $id)
    {
        $module = Module::findOrFail($id);
        $module->update($request->all());

        return "done";
    }

    public static function delete(Request $request, $id)
    {
        $module = Module::findOrFail($id);
        $module->delete();

        return "done";
    }
}
