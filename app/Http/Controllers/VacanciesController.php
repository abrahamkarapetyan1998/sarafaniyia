<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\Store;
use DB; 

class VacanciesController extends Controller
{   
    public function getAll(){
        $vacancies = Vacancy::paginate(15);

        
        $company_names = $vacancies->map(function($item, $key) {
            $item['company'] = Store::where('id', $item['store_id'])->get();
            return $item;
        });

        return response()->json($vacancies , 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }

    public function getCategories(){
        DB::table('vacancy_category')->get();

        return response()->json($vacancies , 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }
    
    public function getEmploymentTypes(){
        $types = DB::table('vacancy_employment')->get();

        return response()->json($types , 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }

    public function getExperiences(){
        $experiences = DB::table('vacancy_experience')->get();

        return response()->json($experiences , 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }
    
    public function getEducation(){
        $education = DB::table('vacancy_education')->get();

        return response()->json($education , 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }

    public function Filter(Request $request){
       
        if($request->has('keyword') || !is_null($request->keyword)){
            $req = $request->keyword;
 
            foreach($req as $item){
                $vacancies =  Vacancy::where('name', 'LIKE', '%' . $item . '%')->get();
                
            }
        }

        if($request->has('category') &&  !is_null($request->category)){
          $vacancies =   Vacancy::where('category_id' ,$request->category)->paginate(15);
        }
        if($request->has('city') && !is_null($request->city)){
            $vacancies =   Vacancy::where('place_id' ,$request->city)->paginate(15);
        }
        if($request->has('salary_min') &&  !is_null($request->salary_min)){
            $vacancies = Vacancy::where('salary', '>=', $request->salary_min)->paginate(15);
        }
        if($request->has('salary_max') &&  !is_null($request->salary_max)){
            $vacancies = Vacancy::where('salary', '<=', $request->salary_max)->paginate(15);
        }
        if($request->has('employment') &&  !is_null($request->employment)){
            $vacancies = Vacancy::where('employment_id', $request->employment)->paginate(15);
        }
        if($request->has('education') &&  !is_null($request->education)){
            $vacancies = Vacancy::where('education_id', $request->education)->paginate(15);
        }
        if($request->has('experience') &&  !is_null($request->experience)){
            $vacancies = Vacancy::where('experience_id', $request->experience)->paginate(15);
        }
        
     

        $company_names = $vacancies->map(function($item, $key) {
            $item['company'] = Store::where('id', $item->pluck('store_id'))->get();
          
            return $item;
        });
       
        if($vacancies->isEmpty()){
            return response()->json(['data' => []] , 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
        }
        
        return response()->json($vacancies, 200 , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }
    public function subscribe(){
        ////////
    }
}
