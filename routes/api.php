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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/register', 'API\mAuthController@register');
Route::post('/login', 'API\mAuthController@login');
Route::get('/users', 'API\mAuthController@all_users');
Route::get('/users/{id}', 'API\mAuthController@show');
Route::patch('/update_user/{id}', 'API\mAuthController@update');
Route::delete('/delete_user/{id}', 'API\mAuthController@destroy');



 Route::apiResource('/vaccines', 'API\VaccineController')->middleware('auth:api');

Route::group(['middleware' => 'auth:api'],function(){
//  Route::post('profile', 'API/mAuthController@details');

});
