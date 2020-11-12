<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummyAPI;
use App\Http\Controllers\CRUDAPI;
use App\Http\Controllers\SearchAPI;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('data',[dummyAPI::class, 'index']);

            // ************* CRUD API ROUTES ***********************

//Get All the devices
Route::get('devices',[CRUDAPI::class, 'getData']);

//Get Single device
Route::get('devices/{id}',[CRUDAPI::class, 'getSingleUser']);

//Add devices to Database
Route::post('devices',[CRUDAPI::class, 'addData']);

//Update devices to Database
Route::put('devices/{id}',[CRUDAPI::class, 'updateData']);

//Delete devices to Database
Route::delete('devices/{id}',[CRUDAPI::class, 'deleteData']);

            // ************* CRUD API ROUTES END ***********************
            
            
            
            // ************* Search API Route ***********************
Route::get('search/{string}',[SearchAPI::class, 'searchData']);




Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
                //**************Resource API API that has all the routes *******************************/
    Route::apiResource('members',MemberController::class);

});



            // ************* Login API Route***********************
Route::post("login",[UserController::class,'login']);




            //****************File Upload Route*********************
Route::post("upload",[FileController::class,'upload']);




        //Authentication API with Passport
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class,'login']);
    Route::post('signup', [AuthController::class,'signup']);
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', [AuthController::class,'logout']);
        Route::get('user', [AuthController::class,'user']);
    });
});