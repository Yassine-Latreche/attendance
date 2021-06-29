<?php

namespace App\Http\Controllers;
use App\Models\Team;
use App\Models\User;
use App\Models\Professor;

use Illuminate\Http\Request;
use Auth;
class TestController extends Controller
{
    public function index() {
        dd(Professor::where('user_Id', Auth::user()->id )->first()['id']);
        // dd(Team::where('name', 'SuperUsers')->first());
        print($user->belongsToTeam(Team::where('name', 'SuperUsers')->first()));
        echo "<br>Test Controller.";
     }
}
