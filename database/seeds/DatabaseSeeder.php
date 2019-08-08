<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create([
            'name' => 'PAULO PINHO',
            'email' =>  'apmcmsm@gmail.com',
            'password' => bcrypt('1@5*7#0'),
        ]); 
        User::create([
            'name' => 'RP',
            'email' =>  'apmcmsm1@gmail.com',
            'password' => bcrypt('a1b2c3@%'),
        ]); 
    }
}
