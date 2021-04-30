<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
                // \App\Models\User::factory(10)->create();
        \Eloquent::unguard();

/*         $this->call('UserTableSeeder');
        $this->command->info('User table seeded!');
 */
        $path = 'app/database/attendance.sql';
        \DB::unprepared(file_get_contents($path));
        $this->command->info('Country table seeded!');
    }
}
