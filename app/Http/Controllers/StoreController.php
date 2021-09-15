<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Store;
use App\Models\News;
use App\Models\BranchHours;
use App\Models\Coupon;
use App\Models\User;
use DB;
use Carbon\Carbon;

class StoreController extends Controller
{

    public function getAll(){
        $branches = Store::paginate(15);


        return response()->json($branches , 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }

    public function Single(Request $request){
        $id = $request->id;
        $store = Store::find($id);
        $discount = DB::table('store_discount_settings')->where('id', $id)->get(['base_discount', 'points_for_enter' ,'points_for_invite']);
        $branch = $store->branch;
        $images = DB::table('storephotos')->where('store_id',  $id)->get();
        $prices = DB::table('pricelist_item')->where('store_id', $id)->get();
        $coupon = Coupon::where('store_id' ,  $id)->get();
        $reviews  = DB::table('reviews')->where('store_id', $id)->get();
        $news = News::where('store_id',  $id)->get();
        foreach($reviews as $review){
            $review->user =  User::where('id', $review->user_id)->get();
        }
      

        return response()->json(["store" => $store, "discounts" => $discount, "images" => $images, "pricelist" => $prices, "coupons" =>  $coupon, "reviews" => $reviews , 'news' => $news ] , 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }

    public function Filter(Request $request){
        

        if($request->has('category') && !is_null($request->category)){
            $stores_categories =  DB::table('storecategory')->where('category_id', $request->category)->get();
      
            foreach($stores_categories as $branch){
                $stores[] = Branch::where("store_id" , $branch->store_id)->get();
            }
            foreach($stores[0] as $store){
              
                $store['company'] = Store::where('id', $store['store_id'])->get();
            }
     
         }
        
        if($request->has('keyword') &&  !is_null($request->keyword)){
            $req = $request->keyword;
 
            foreach($req as $item){
                $stores =  Branch::where('name', 'LIKE', '%' . $item . '%')->get();
                
            }
          $branches_full = $stores->map(function($item, $key) {
            $item['company'] = Store::where('id', $item['store_id'])->get();
            return $item;
        });
        }
       
    

        if($request->has('sort_by') &&  !is_null($request->sort_by)){
            
            if($request->sort_by === 'rating'){
                $stores = Branch::orderBy('rating', 'desc')->get();
                $branches_full = $stores->map(function($item, $key) {
                    $item['company'] = Store::where('id', $item['store_id'])->get();
                    return $item;
                });
               
            }

            if($request->sort_by === 'nearby' ){
                $lat = floatval($request->lat);
                $long = floatval($request->long);
         
                $stores =  Branch::orderBy(DB::raw("3959 * acos( cos( radians({$lat}) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(-{$long}) ) + sin( radians({$lat}) ) * sin(radians(lat)) )"), 'ASC')
                ->get();
                
                $branches_full = $stores->map(function($item, $key) {
                    $item['company'] = Store::where('id', $item['store_id'])->get();
                    return $item;
                });
                }   
        }
          if($request->has('working_time') &&  !is_null($request->working_time)){
            if($request->working_time == 'open'){
                $now = Carbon::now()->format('h:m');
                
                
                $stores = Branch::whereHas('hours', function($q) {
                    $q->where('from', '<', Carbon::now()->format('h:m'))->where('to', '>' ,Carbon::now()->format('h:m'));
                })->get() ; 
                //check week days TO DO
                $branches_full = $stores->map(function($item, $key) {
                    $item['company'] = Store::where('id', $item['store_id'])->get();
                    return $item;
                });
            }
           if($request->working_time == 'all_day'){
            $stores =   Branch::where('is_working_all_day', 1)->get();
                
            $branches_full = $stores->map(function($item, $key) {
                $item['company'] = Store::where('id', $item['store_id'])->paginate(15);
                return $item;
            });
           }
      }
        if($request->has('payment_type') && !is_null($request->payment_type)){
            if($request->payment_type == 'card'){
                $stores = Branch::whereHas('store', function($q) {
                    $q->where('payment_type', 0);
                })->get() ; 
            
                $branches_full = $stores->map(function($item, $key) {
                    $item['company'] = Store::where('id', $item['store_id'])->get();
                    return $item;
                });
            }
            if($request->payment_type == 'cash'){
                $stores = Branch::whereHas('store', function($q) {
                    $q->where('payment_type', 1);
                })->get() ; 
            
                $branches_full = $stores->map(function($item, $key) {
                    $item['company'] = Store::where('id', $item['store_id'])->get();
                    return $item;
                });
            }
            if($request->has('order_type') && !is_null($request->order_type)){
                if($request->order_type == 'online'){
                    $stores = Branch::whereHas('store', function($q) {
                        $q->where('online_order_enabled', 1);
                    })->get() ; 
                }
                if($request->order_type == 'cash'){
                    $stores = Branch::whereHas('store', function($q) {
                        $q->where('delivery_enabled', 1);
                    })->get() ; 
                }
            }
        }
       
        $collection = collect($stores);

        return response()->json($stores , 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }

    public function WorkingHours(Request $request){
        $id = $request->id;
        $branches_hours = BranchHours::where('branch_id', $id)->get() ; 

        return response()->json($branches_hours , 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }

    public function Branches(Request $request){
        $id = $request->id;
        $store = Store::find($id);
        $branches=  $store->branch;
        $working_hours = [];
        $now = Carbon::now();
      
        foreach($branches as $item){
            
            $item->working_hours = DB::table('branch_working_hours')
            ->where('branch_id', $item->id)
            ->where('week_day', $now->dayOfWeek)->get();
        }

    
        foreach($branches as $branch){
            if($branch->is_working_all_day = 0){
                $start = Carbon::parse($branch['working_hours'][0]->from)->format('h:m');
                $end = Carbon::parse($branch['working_hours'][0]->to)->format('h:m');
    
             if ($now->between($start, $end)) {
                $branch->is_open = 1;
            }
            else{
                $branch->is_open = 0;
            }
         }
         else{
             $branch->is_open = 1;
         }
        }

        
        if($branches->isEmpty()){
            return response()->json(['data' => []] , 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
        }
    
     

        return response()->json($branches , 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }
}
