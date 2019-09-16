<?php

namespace App\Http\Controllers\root;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Admin;        
use Auth;
use App\Attendance;
use App\User;
use Carbon;
use DB;

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
    $mytime = Carbon\Carbon::now("Asia/Manila")->toDateString();
    $att_today= Attendance::attendance_today();
    $user_count = User::count();
    $attendance_count = Attendance::where('date', '=', $mytime)->count();

  
    return view('root.dashboard', ['att' => $att_today, 'user_count' => $user_count, 'attendance_count' => $attendance_count]);

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
