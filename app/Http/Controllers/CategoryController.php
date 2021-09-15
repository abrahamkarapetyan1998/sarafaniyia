<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class CategoryController extends Controller
{
    public function GetAll(){
       $category = DB::table('category')->get();
       
       return response()->json($category , 200 , ['Content-Type' => 'application/JSON;charset=UTF-8;', 'Charset' => 'utf-8'],
       JSON_UNESCAPED_UNICODE |JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES );
    }
}
