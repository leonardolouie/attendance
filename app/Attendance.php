<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon;

class Attendance extends Model
{
    

    public static function attendance_today()
    {
        $mytime = Carbon\Carbon::now("Asia/Manila")->toDateString();
        $attendance_today = DB::select("SELECT users.first_name, users.last_name, users.middle_name, users.email, 
        attendances.time, attendances.status, attendances.coordinates, attendances.address
        from  attendances INNER JOIN users ON 
        attendances.user_id = users.id WHERE date = '$mytime' ORDER BY time DESC");

        //dd($attendance_today);
        return $attendance_today;
    }

}
