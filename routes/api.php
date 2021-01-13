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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Show All Data
Route::get('country','App\Http\Controllers\CountryController@country');

//Show Data BY ID
Route::get('country/{id}','App\Http\Controllers\CountryController@countryByID');

//Insert Data
Route::post('country','App\Http\Controllers\CountryController@countrySave');

//Country Update
Route::put('country/{id}','App\Http\Controllers\CountryController@countryUpdate');

//Country Delete
Route::delete('country/{id}','App\Http\Controllers\CountryController@countryDelete');
