<?php

namespace App\Http\Controllers;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        return Session::all();
    }
 
    public function show($id)
    {
        return Session::find($id);
    }

    public function store(Request $request) {
        $request->merge([
            'date' => date('Y-m-d',strtotime($request->get('date'))),
            'starting' => date('H:i:s',strtotime($request->get('starting'))),
            'ending' => date('H:i:s',strtotime($request->get('ending')))
        ]);
        $session = new Session($request->all());
        $session->save();

        return "well done";
    }

    public function update(Request $request, $id)
    {
        $request->merge([
            'date' => date('Y-m-d',strtotime($request->get('date'))),
            'starting' => date('H:i:s',strtotime($request->get('starting'))),
            'ending' => date('H:i:s',strtotime($request->get('ending')))
        ]);
        $session = Session::findOrFail($id);
        $session->update($request->all());

        return $session;
    }

    public function delete(Request $request, $id)
    {
        $session = Session::findOrFail($id);
        $session->delete();

        return 204;
    }
}