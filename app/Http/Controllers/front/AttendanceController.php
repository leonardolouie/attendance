<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Session;
use App\Attendance;
use Carbon;
use DB;

class AttendanceController extends Controller
{
    protected $auth;
        public function __construct(Auth $auth)
        {
            $this->auth = $auth;
        }
        public function index()
        {
         return view('front.time');
        }
     public function timein(Request $request)
     {
         $mytime = Carbon\Carbon::now()->toDateString();
       
         $status = "IN";
         $this->validate($request, ['coordinates'=>'required', 'address' => 'required', 'time' => 'required']);
         //$in_validator = Attendance::where('user_id', Auth::user()->id)->where('date', $mytime)->get();
      
             $att = new Attendance();
             $att->date = $mytime;
             $att->time = request('time');
             $att->status =$status;
             $att->coordinates = request('coordinates');
             $att->address = request('address');
             $att->user_id = Auth::user()->id;
             $att->save();
             $message='Sucessfully Time in !';
            $this->auth::guard()->logout();
            $request->session()->invalidate();
            $request->session()->flash('message', $message);
            return redirect()->route('login');
    }
    public function timeout(Request $request)
    {
   $mytime = Carbon\Carbon::now()->toDateString();
     $this->validate($request, ['coordinates'=>'required', 'address' => 'required', 'time' => 'required']);
     $att = new Attendance();
 
     $status = "OUT";
     $att = new Attendance();
     $att->date = $mytime;
     $att->time = request('time');
     $att->status =$status;
     $att->coordinates = request('coordinates');
     $att->address = request('address');
     $att->user_id = Auth::user()->id;
     $att->save();
     $message='Sucessfully Time out!';
   
         $this->auth::guard()->logout();
         $request->session()->invalidate();
         $request->session()->flash('message', $message);
         return redirect()->route('login');
     }
}