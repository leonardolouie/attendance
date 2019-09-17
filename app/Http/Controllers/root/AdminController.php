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
  
  
  public function logout(Request $request) {
    
    $this->auth::guard()->logout();
    $request->session()->invalidate();
    return redirect('admin/login');

  }

  public function profile() { 

    $user = Admin::where('id', Auth::user()->id)->get();
    return view('root.profile', ['user' => $user]);
  }

  public function update(Request $request) {

    $this->validate($request, ['first_name'=>'required|min:3', 'last_name' => 'required|min:3','middle_name'=>'required|min:3', 'username' => 'required|min:5', 'email' => 'required']);

    $user = Admin::find(request('id'));
    $user->first_name = request('first_name');
    $user->last_name = request('last_name');
    $user->middle_name =request('middle_name');
    $user->email = request('email');
    $user->username = request('username');
    $user->save();

    $request->session()->flash('message_create', 'Sucessfully updated account');
    return redirect()->back()->withInput();
  }
  
  public function update_password(Request $request) {
  
    
    $this->validate($request, ['password'=>'required|min:8']);
    $user = Admin::find(request('id'));
    $user->password= bcrypt(request('password'));
    $user->save();
    $request->session()->flash('message_create', 'Sucessfully updated password');
    return redirect()->back()->withInput();
    
  }
  
  
}
