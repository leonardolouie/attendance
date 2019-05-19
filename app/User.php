<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function all_employee()
    {


     $users =DB::select('SELECT id, concat(last_name,",",first_name," ", middle_name)AS full_name, username, email, case when status = "0" then "Deactivated" WHEN status = "1" then "Activated" ELSE "Deactivated" END as employee_status from users');


     return $users;
    }

  

    public static function activated_user()
    {


     $users =DB::select('SELECT id, concat(last_name,",",first_name," ", middle_name)AS full_name, username, email, created_at, updated_at from users where status = "1"');

     return $users;

    }

     public static function deactivated_user()
    {


     $users =DB::select('SELECT id, concat(last_name,",",first_name," ", middle_name)AS full_name, username, email,created_at, updated_at from users where status = "0"');

     return $users;

    }
}
