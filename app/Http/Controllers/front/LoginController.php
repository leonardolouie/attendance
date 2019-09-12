<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


use Validator;
use Auth;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    
    use AuthenticatesUsers;
    
    /**
    * Where to redirect users after login.
    *
    * @var string
    */
    // protected $redirectTo = '/timein';
    
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    // public function __construct()
    // {
        //     $this->middleware('guest')->except('logout');
        // }
        
        public function index() {

         return view('front.login'); 
        }
        
        
        public function login(Request $request) {
            
         $this->validate($request, ['username' => 'required', 'password'=>'required|min:8']);
         $user_data = array('username' => request('username'), 'password' => request('password')); 
            
            if(Auth::attempt($user_data)) {
                if(Auth::user()->status == 1){
                    return redirect('attendance');
                }
                else {
                    $request->session()->invalidate();
                    $request->session()->flash('message_error', 'Your account is deactivated kindly contact Website Admin!');
                    return redirect()->route('login');
                    
                }
            }
            
            else {
                $request->session()->flash('password_koto', 'Password and Username did not match');
                return redirect()->back()->withInput();
            }
        }
}
    