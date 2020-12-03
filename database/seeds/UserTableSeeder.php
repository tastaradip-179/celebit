<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	

         // create admin user
        $admin = User::create([
            'name' => 'Admin', 
            'email' => 'admin@celebrityapp.com', 
            'password' => bcrypt('Gonzo1982'),  
        ]);
        $admin->save();
    }
}
