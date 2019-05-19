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
       


         $this->validate($request, ['coordinates'=>'required', 'address' => 'required', 'time' => 'required']);

         $in_validator = Attendance::where('user_id', Auth::user()->id)->where('date', $mytime)->get();

         if($in_validator->isEmpty())
         {

             $att = new Attendance();

             $att->date = $mytime;
             $att->time_in = request('time');
             $att->coordinates = request('coordinates');
             $att->address = request('address');
             $att->user_id = Auth::user()->id;
             $att->save();

             $message='Sucessfully logged in enjoy Your day!';
         }

         else 
         {

             $message='You are already logged in';
         }





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

    //checking if time in is empty
      $out_validator = Attendance::where('user_id', Auth::user()->id)->where('date', $mytime)->get();



     if(!$out_validator->isEmpty())
     {
            //checking if time_out is existing
       $out_validator2 = Attendance::where('user_id', Auth::user()->id)->where('date', $mytime)->where('time_out', null)->get();
      if(!$out_validator2->isEmpty())
      {
      $db = DB::table('attendances')->where('user_id',Auth::user()->id)->where('date', $mytime)->update(['time_out' => request('time')]);
      $message="Successfully logged out! thanks";
      }
      else
      {
 
        $message="You are already logged out!";
      }


     }
     else
     {
     $message="You must logged in first";

     }



   


         $this->auth::guard()->logout();
         $request->session()->invalidate();
         $request->session()->flash('message', $message);
         return redirect()->route('login');

     }

}





