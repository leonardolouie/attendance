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
        //

        DB::table('users')->insert([
            
            'first_name' => 'TestName',
            'middle_name' => 'TestMname',
            'last_name' => 'lastname',
            'username' => 'user1' ,
            'email' =>'hr-admin@gmail.com',
            'password' => bcrypt('secret123'),
            'status' => '1',
         
            ]);

           DB::table('users')->insert([
            
            'first_name' => 'Lourdan',
            'middle_name' => 'Pogi',
            'last_name' => 'Lourdan',
            'username' => 'lourdan123' ,
            'email' =>'hr-qqqadmin@gmail.com',
            'password' => bcrypt('secret123'),
         
            ]);



        DB::table('admins')->insert([
            
            'first_name' => 'TestName',
            'middle_name' => 'TestMname',
            'last_name' => 'lastname',
            'username' => 'admin' ,
            'email' =>'hr-admin@gmail.com',
            'password' => bcrypt('secret123'),
         
            ]);
    }
}
