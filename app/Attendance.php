<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon;

class Attendance extends Model
{
    

    public static function attendance_today()
    {
        $mytime = Carbon\Carbon::now()->toDateString();
         
     	
        $attendance_today = DB::select("SELECT * from  attendances INNER JOIN users ON attendances.user_id = users.id WHERE date = '$mytime' ORDER BY time_in DESC");



        return $attendance_today;


    }

    


    


}
