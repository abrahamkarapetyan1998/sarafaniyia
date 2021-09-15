<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PhoneCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use DB;

class AuthController extends Controller
{

    public function Me(Request $request)
    {
         return response()->json(auth('sanctum')->user());
    }


    public function Register(Request $request)
    {
 
        $data = $request->all();
        $validator = Validator::make($data,[
            'name' => 'string|required|max:255',
            'surname' => 'required|string|max:255|',
            'birthday' => 'required',
            'sex'  => 'required',
        ]);
        
      
        if ($validator->fails()) {
          
            return response()->json([$validator->messages(), 'status' => 500], 500);
        }
       $user =  User::create([
            'fullname' => $data['name']." ".$data['surname'],
            'birthday' => $data['birthday'],
            'sex' => $data['sex'],
            'phone' => $data['phone'],
        ]);
        
       $phone = PhoneCode::where('phone' , $data['phone'])->first();
       
       $phone->delete();
          
       $token = $user->createToken('auth_token')->plainTextToken;
        
        return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Bearer',
        ]);
    }
   
    public function GetPhone(Request $request){
        $data = $request->all();

        $validator = Validator::make($data,[
         'phone' => 'required|max:15|integer',
        ]);

        if ($validator->fails()) {
          
            return response()->json([$validator->messages(), 'status' => 500], 500);
        }
        else {
            return response()->json(["msg" =>"everything is ok", 'status' => 200], 200);
        }
    }

   
    public function GetCall(Request $request)
    {
        $data = $request->all();
        $secret_key =  env('SECRET_KEY');
        $service_id  = env('SERVICE_id', "246998");
        $client_phone = $data['phone'];
        $code = 1111  ;
       
        $requestCall = file_get_contents('https://api.ucaller.ru/v1.0/initCall?service_id='.$service_id.'&key='.$secret_key.'&phone='.$client_phone.'&code='.$code);
        $requestCall = json_decode($requestCall, true);


        if($requestCall['status'] == true) 
        { 
            $phone_code = PhoneCode::create([
               'phone' => $data['phone'],
               'code' => $code,
                
            ]);
            return response()->json(["msg" => "everything is ok", 'status' => 200], 200);
        }
        else{
            return response()->json([
                'data' => $requestCall,
                'status' => 400,
        ]);
        }
    }
   
    public function ValidateCode(Request $request){
        $data = $request->all();
        $phone_code = PhoneCode::where('phone', $data['phone'])->first();
           

    if($phone_code->code == $data['code'] && User::where('phone', $data['phone'])->exists() )
        {
            $user =  User::where('phone', $data['phone'])->first();
            $token = $user->createToken('auth_token')->plainTextToken;
        
            return response()->json([
                        'access_token' => $token,
                        'token_type' => 'Bearer',
            ]);
            
        }
        else if($phone_code->code != $data['code']){

            return response()->json(["msg" => "Code Does Not Match", 'status' => 500], 500);
        }
        else
        {
            return response()->json(["msg" => "Everything is ok", 'status' => 200], 200);
        }
    }
    
    public function GetCountries(){
        $countries = DB::table('countries')->get();

        return response()->json($countries , 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }
}
