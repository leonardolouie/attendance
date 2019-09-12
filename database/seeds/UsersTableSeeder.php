<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    
        DB::table('admins')->insert([
            
            'first_name' => 'Lester ',
            'middle_name' => 'V',
            'last_name' => 'Concepcion',
            'username' => 'admin_username' ,
            'email' =>'lesterv@gmail.com',
            'password' => bcrypt('secret123'),
         
            ]);
    }
}
