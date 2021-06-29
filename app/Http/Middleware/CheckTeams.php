<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\Team;
use App\Models\User;
use Auth;

class CheckTeams
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $superUserTeam = Team::where('name', 'SuperUsers')->first();
        if (!$user->belongsToTeam($superUserTeam)) {
            return back()->with('error','You are not a super user.');
        }
        return $next($request);
    }
}
