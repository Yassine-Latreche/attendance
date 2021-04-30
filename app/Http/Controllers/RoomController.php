<?php

namespace App\Http\Controllers;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return Room::all();
    }
 
    public function show($id)
    {
        return Room::find($id);
    }

    public function store(Request $request) {
        $room = new Room($request->all());
        $room->save();

        return "well done";
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $room->update($request->all());

        return $room;
    }

    public function delete(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return 204;
    }
}