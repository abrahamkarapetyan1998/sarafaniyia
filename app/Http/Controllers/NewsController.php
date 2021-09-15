<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Store;
use App\Models\StoreCategory;
use DB;

class NewsController extends Controller
{
    
    public function GetAll(){
      
        $news = News::paginate(15);
        $names = $news->map(function($item, $key) {
             $item['company'] = Store::where('id', $item['store_id'])->get();
             return $item;
        });
           
        return response()->json($news , 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }
      
    public function FilterByCategory(Request $request){
        
        $category =  $request->id;
        $stores = StoreCategory::where('category_id', $category)->pluck('store_id');
        $news =  News::whereIn('store_id', $stores)->paginate(15);
       
        $company_names = $news->map(function($item, $key) {
            $item['company'] = Store::where('id', $item['store_id'])->pluck('title');
            return $item;
        });


        return response()->json($news , 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }
    
    public function Single(Request $request){
        $data = $request->all();
        
        $news = News::find($data['id'])->get();
        $company_names = $news->map(function($item, $key) {
            $item['company'] = Store::where('id', $item['store_id'])->get();
            return $item;
        });

        return response()->json($news , 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }
}
