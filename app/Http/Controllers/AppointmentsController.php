<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\User;
use App\Models\Branch;
use DB;
use App\Models\Appointment;
use Carbon\CarbonPeriod;
use Carbon\Carbon;

class AppointmentsController extends Controller
{
    public function getMasters(Request $request){
        $master = User::where('branch_id', $request->branch_id)->get();


        return response()->json($master, 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }

    public function getPricelist(Request $request){
        $pricelist_item = DB::table('employee_pricelist')->where('user_id', $request->user_id)->get();
        
       
        foreach($pricelist_item as $item){
            $pricelist = collect(DB::table('pricelist_item')->where('id', $item->pricelist_item_id)->get());
        }
        
    
 
        return response()->json($pricelist, 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }

    public function getTime(Request $request){
        $data = $request->all();
        $date = $data['date'];
       
        $reserved_hours =  Appointment::where("date" , $data['date'])
        ->where('branch_id'  , $data['branch_id'])
        ->where('employee_id',  $data['master_id'])->get(['time']) ;
        
        $working_hours =  DB::table("branch_working_hours")
        ->where('branch_id', $data['branch_id'])
        ->where('week_day', Carbon::parse($date)->dayOfWeek)->get();
        
        $service_time = DB::table('pricelist_item')->where('id', $data['service_id'])->get("service_time");

        return response()->json(["reserved_hours" =>  $reserved_hours ,"working_hours" => $working_hours , "service_time" => $service_time], 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }

    public function Book(Request $request){
        $data = $request->all();
        $appointment = Appointment::create($data);
       
        return response()->json($appointment, 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);

    } 
}
