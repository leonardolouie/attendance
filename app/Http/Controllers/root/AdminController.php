<?php

namespace App\Http\Controllers\root;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Admin;        
use Auth;
use App\Attendance;

class AdminController extends Controller
{

  
  protected $auth;
  
  public function __construct(Auth $auth) {

    $this->auth = $auth;
    
  }
  public function index() {

    return view('root.auth.login');

  }
  public function login(Request $request) {
    
    $this->validate($request, ['username' => 'required', 'password'=>'required|min:8']);
    $user_data = array('username' => request('username'), 'password' => request('password')); 
    
    if(Auth::guard('admin')->attempt($user_data)) {
      return redirect('admin/dashboard');
    }
    else {
      $request->session()->flash('password_koto', 'Password and Username did not match');
      return redirect()->back()->withInput();
    }
    
  }
  public function dashboard() { 

    $att_today= Attendance::attendance_today();
    return view('root.dashboard', ['att' => $att_today]);

  }
  
  
  public function list() {

    $att_today= Attendance::attendance_today();
    return response()->json($att_today);
    
  }
  
  public function logout(Request $request) {
    
    $this->auth::guard()->logout();
    $request->session()->invalidate();
    return redirect('admin/login');

  }
  
  
}
