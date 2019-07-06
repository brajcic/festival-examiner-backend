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

Route::post('/register' , 'AuthController@register');
Route::post('/login' , 'AuthController@login');
Route::post('/logout' , 'AuthController@logout');
Route::post('/add' , 'AddFestivalController@add');
//Route::post('/addComment' , 'AddComment@addComment');
Route::get('/addRating' , 'AddRating@addRating');
Route::get('/searchFestivals' , 'AddFestivalController@search');
Route::get('/showFestivals' , 'AddFestivalController@show');
Route::post('/deleteFestival' , 'AddFestivalController@deleteFestival');
Route::get('/distance', 'AddFestivalController@distance');
Route::post('/addCategory' , 'CategoryController@add');
Route::post('/deleteCategory' , 'CategoryController@delete');
Route::post('/updateCategory' , 'CategoryController@update');
Route::post('/showCategory', 'CategoryController@show');
Route::post('/updateCategory' , 'CategoryController@update');