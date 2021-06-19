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

// Route::get('/family', 'Admin\FamilyController@indexJSON');

// Route::get('/jemaat', 'Admin\JemaatController@indexJSON');

// pertemuan 4

Route::get('/family', 'Api\FamilyController@index');
Route::get('/family/{id}', 'Api\FamilyController@details');
Route::get('/family/show/{id}', 'Api\FamilyController@show');
Route::post('/family', 'Api\FamilyController@create');
Route::put('/family/{id}', 'Api\FamilyController@update');
Route::delete('/family/delete/{id}','Api\FamilyController@delete');

Route::get('/jemaat', 'Api\JemaatController@index');
Route::get('/jemaat/{id}', 'Api\JemaatController@details');
Route::post('/jemaat', 'Api\JemaatController@create');
Route::put('/jemaat/{id}', 'Api\JemaatController@update');
Route::delete('/jemaat/delete/{id}','Api\JemaatController@delete');