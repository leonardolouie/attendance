<?php

namespace App\Http\Controllers\root;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use App\User;
use App\Attendance;


class AdminattendanceController extends Controller
{
    //
    
    
    public function index() {
        
        return view('root.attendance.index');
    }
    
    
    public function employee_attendance() {

     $users= User::all_employee();
     return view('root.attendance.employee_attendance', ['users' => $users]);
        
    }
    
    
    public function show_data($id) { 
        
     $users = User::find($id);
     $attendances = Attendance::where('user_id', $id)->get();
        
     return view('root.attendance.employee', ['users' => $users, 'attendances' => $attendances]);
     
    }
    
}
