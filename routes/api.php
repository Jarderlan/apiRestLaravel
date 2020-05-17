<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    Route::get('/', function(){
        return response()->json(['message'=>'Jobs API', 'status' => 'Connected']);
    });

    Route::resource('jobs', 'JobsController');
    Route::resource('companies', 'CompaniesController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
