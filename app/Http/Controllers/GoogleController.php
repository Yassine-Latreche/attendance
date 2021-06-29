<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller {
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
                return redirect()->intended('teacher_dashboard');
            }else{

                $request = new Request();
                $request->request->add(['user_Id' => $user->id]);
                $p = Professor::where('email', $user->email)->first();
                if ($p == null) {
                    return redirect('/register')->with('error','Vous n\'êtes pas professeur, merci de contacter l\'administration.');
                } else {
                    $newUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'google_id'=> $user->id,
                        'password' => encrypt(sha1(hash("sha256",md5(uniqid()))))
                    ]);

                    DB::table('team_user')->insert(
                        array(
                            'id' => DB::table('team_user')->lastInsertId() + 5,
                            'user_id'   =>   $user->id,
                            'team_id' =>     Team::where('name', 'Teachers')->first()->id,
                            'role' => 'editor'
                        ));
                    $u = User::find($user->id);
                    $u->current_team_id = Team::where('name', 'Teachers')->first()->id;
                    $u->save();
                    $update = ProfessorController::update($request, $p->id);
                    Auth::login($newUser);

                    return redirect()->intended('teacher_dashboard');
                }
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}