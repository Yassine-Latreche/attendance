<?php

namespace App\Http\Controllers;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        return Module::all();
    }
 
    public function show($id)
    {
        return Module::find($id);
    }

    public function store(Request $request) {
        $module = new Module();
        $module->module = $request->get('module');
        $module->save();

        return "well done";
    }

    public function update(Request $request, $id)
    {
        $module = Module::findOrFail($id);
        $module->update($request->all());

        return $module;
    }

    public function delete(Request $request, $id)
    {
        $module = Module::findOrFail($id);
        $module->delete();

        return 204;
    }
}
