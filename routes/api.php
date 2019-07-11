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

Route::get('/showFestivals' , 'AddFestivalController@show');

Route::get('/filters' , 'AddFestivalController@filters');

Route::post('/showCategory', 'CategoryController@show');

Route::post('/showComments' , 'CommentController@showid');

Route::get('/addComment' , 'AddCommentController@addComment');

Route::group(['middleware' => ['jwt.auth']], function() {
     
    Route::post('/add' , 'AddFestivalController@add');
    
    Route::post('/addCategory' , 'CategoryController@add');
    
    Route::post('/updateCategory' , 'CategoryController@update');
    
    Route::post('/deleteFestival', 'AddFestivalController@deleteFestival');
    
    Route::post('/deleteCategory' , 'CategoryController@delete');
    
    Route::post('/deleteComment' , 'CommentController@delete');
    
    Route::post('/deleteRating' , 'RatingController@delete');
        
    //Route::post('/showCategory', 'CategoryController@show');
    
    Route::post('/updateFestival' , 'AddFestivalController@update');
    
    Route::post('/showFestivalByID' , 'AddFestivalController@showFestivalByID');
});
   
