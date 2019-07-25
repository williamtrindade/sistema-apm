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
            'name' => 'Super Admin',
            'email' =>  'admin@gmail.com',
            'password' => bcrypt('1234567890'),
        ]); 
    }
}
