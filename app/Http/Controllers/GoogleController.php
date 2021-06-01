<?php

  

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;

use Exception;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

  

class GoogleController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();

    }

        

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function handleGoogleCallback()

    {

        try {

      

            $user = Socialite::driver('google')->user();

       

            $finduser = User::where('email', $user->email)->first();

       

            if($finduser){

       
                $finduser->forceFill(['google_id'=> $user->id])->save();
                Auth::login($finduser);

      

                return redirect()->intended('dashboard');

       

            }else{

                $newUser = User::create([

                    'name' => $user->name,

                    'email' => $user->email,

                    'google_id'=> $user->id,

                    'password' => encrypt('123456dummy')

                ]);

                DB::table('team_user')->insert(
                    array(
                           'id' => DB::table('team_user')->lastInsertId() + 5,
                           'user_id'   =>   $user->id,
                           'team_id' =>     Team::where('name', 'Teachers')->first()->id,
                           'role' => 'editor'
                    )
                $u = User::find($user->id);
                $u->current_team_id = Team::where('name', 'Teachers')->first()->id;
                $u->save();

                Auth::login($newUser);

      

                return redirect()->intended('dashboard');

            }

      

        } catch (Exception $e) {

            dd($e->getMessage());

        }

    }

}