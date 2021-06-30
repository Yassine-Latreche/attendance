<?php

namespace App\Actions\Fortify;

use Illuminate\Http\Request;
use App\Http\Controllers\ProfessorController;
use App\Models\Team;
use App\Models\User;
use App\Models\Professor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) {
                $this->createTeam($user);
                $this->createProfessor($user);
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        // dd($user->id);
        DB::table('team_user')->insert(
            array(
                   'id' => (DB::table('team_user')->count()-1)*10+5 + 10,
                   'user_id'   =>   $user->id,
                   'team_id' =>     Team::where('name', 'Teachers')->first()->id,
                   'role' => 'editor'
            ));
        $u = User::find($user->id);
        $u->current_team_id = Team::where('name', 'Teachers')->first()->id;
        $u->save();
       
        // $user->ownedTeams()->save(Team::forceCreate([
        //     'user_id' => $user->id,
        //     'name' => explode(' ', $user->name, 2)[0]."'s Team",
        //     'personal_team' => true,
        // ]));
    }
    protected function createProfessor(User $user)
    {
        $request = new Request();
        $request->request->add(['user_Id' => $user->id]);
        $p = Professor::where('email', $user->email)->first();
        if ($p == null) {
            $user->delete();
            return redirect('/register')->with('error','Vous n\'êtes pas professeur, merci de contacter l\'administration.');
        } else {
            $p->update(array('user_Id' => $user->id));
        }
    }
}
