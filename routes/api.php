<?php

use Illuminate\Http\Request;

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

//Article
Route::get('articles','ArticleController@index');
Route::post('article','ArticleController@store');
Route::get('article/{id}','ArticleController@show');
Route::post('article/{id}','ArticleController@update');
Route::delete('article/{id}','ArticleController@destroy');

//Product
Route::get('products','ProductController@index');
Route::post('product','ProductController@store');
Route::get('product/{id}','ProductController@show');
Route::post('product/{id}','ProductController@update');
Route::delete('product/{id}','ProductController@destroy');

//Retal
Route::get('rentals','RentalController@index');
Route::post('rental','RentalController@store');
Route::get('rental/{id}','RentalController@show');
Route::post('rental/{id}','RentalController@update');
Route::delete('rental/{id}','RentalController@destroy');