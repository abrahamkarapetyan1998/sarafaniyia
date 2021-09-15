<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\VacanciesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Models\User;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// AUTH ROUTES
Route::post('/register', [AuthController::class, 'Register']);
Route::post('/call' , [AuthController::class, 'GetCall']);
Route::post('/validate_code', [AuthController::class , 'ValidateCode']);
Route::get('/countries', [AuthController::class , 'GetCountries']);
Route::get('/me' ,  [AuthController::class , 'Me'])->middleware('auth:sanctum');
//CATEGORY ROUTES

Route::get('/category_all', [CategoryController::class , 'GetAll']);

//NEWS ROUTES

Route::get('/news_all', [NewsController::class, 'GetAll']);
Route::post('/news_filter', [NewsController::class, 'FilterByCategory']);
Route::get('/news_single', [NewsController::class, 'Single']);


//COUPONS ROUTES

Route::get('/coupons_all',  [CouponController::class , 'GetAll']);
Route::post('/coupons_filter', [CouponController::class, 'FilterByCategory']);
Route::post('/coupons_single', [CouponController::class, 'Single']);
Route::post('/coupon_code', [CouponController::class ,  'GetCode']);


//Vacancies Routes 

Route::get('/vacancies_all', [VacanciesController::class, 'GetAll']);
Route::get('/vacancies_categories', [VacanciesController::class, 'getCategories']);
Route::get('/cities', [Controller::class  , 'getCities']);
Route::get('/vacancy_types', [VacanciesController::class, 'getEmploymentTypes']);
Route::get('/vacancy_experience', [VacanciesController::class, 'getExperiences']);
Route::get('/vacancy_education', [VacanciesController::class, 'getEducation']);
Route::post('/vacancy_filter', [VacanciesController::class , 'Filter']);

//STORES ROUTES


Route::get('/stores_all', [StoreController::class , 'getAll']);
Route::post('/stores_filter', [StoreController::class , 'Filter']);
Route::get('/store_single', [StoreController::class,  'Single']);
Route::post('/branch_hours', [StoreController::class, 'WorkingHours']);
Route::get('/branches' ,[StoreController::class , 'Branches']);

//Appointments 
Route::post('/masters', [AppointmentsController::class , 'getMasters']);
Route::post('/pricelist', [AppointmentsController::class, 'getPricelist']);
Route::post('/book', [AppointmentsController::class, 'Book']);
Route::post('/get_times', [AppointmentsController::class, 'getTime']);