<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Store;
use App\Models\StoreCategory;
use App\Models\CouponCode;
use Auth;

class CouponController extends Controller
{
    public function GetAll(){
      
        $coupons = Coupon::paginate(15);
     
           
        return response()->json($coupons , 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }
    
    public function FilterByCategory(Request $request){
        
        $category =  $request->id;
        $stores = StoreCategory::where('category_id', $category)->pluck('store_id');
        $coupons =  Coupon::whereIn('store_id', $stores)->paginate(15);
       
        $company_names = $coupons->map(function($item, $key) {
            $item['company'] = Store::where('id', $item['store_id']);
            return $item;
        });


        return response()->json($coupons , 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }
    public function Single(Request $request){
        $data = $request->all();
        
        $coupon = Coupon::find($data['id'])->first();
        
        $company_names = $coupon->map(function($item, $key) {
            $item['company'] = Store::where('id', $item['store_id'])->get();
            return $item;
        });

        return response()->json($coupon , 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }

    public function GetCode(Request $request){
        $coupon = Coupon::where('id', $request->id)->first();
        $user = auth('sanctum')->user()->id;
        
        $code = CouponCode::create([
            'user_id' => $user,
            'coupon_id' => $coupon->id,
        ]);

        return response()->json($code->id , 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }   
}
