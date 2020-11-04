<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummyAPI;
use App\Http\Controllers\CRUDAPI;

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


//Get All the members
Route::get('members',[CRUDAPI::class, 'getData']);


//Get Single Member
Route::get('members/{id}',[CRUDAPI::class, 'getSingleUser']);


//Add Member to Database
Route::post('members',[CRUDAPI::class, 'addData']);


//Update Data to Database
Route::put('members/{id}',[CRUDAPI::class, 'updateData']);


//Delete Data to Database
Route::delete('members/{id}',[CRUDAPI::class, 'deleteData']);
