<?php

namespace App\Http\Controllers;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index()
    {
        return Record::all();
    }
 
    public function show($id)
    {
        return Record::find($id);
    }

    public function store(Request $request) {
        $record = new Record($request->all());
        $record->save();

        return "well done";
    }

/*     public function update(Request $request, $id)
    {
        $request->merge([
            'scanning_time' => date('H:i:s',strtotime($request->get('scanning_time'))),
            'sending_time' => date('H:i:s',strtotime($request->get('sending_time')))
        ]);
        $record = Record::findOrFail($id);
        $record->update($request->all());

        return $record;
    }

    public function delete(Request $request, $id)
    {
        $record = Record::findOrFail($id);
        $record->delete();

        return 204;
    } */
}
