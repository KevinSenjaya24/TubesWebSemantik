<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/tribun', 'Admin\RssController@tribun')->name('admin.rss.tribun');
Route::get('/sindonews', 'Admin\RssController@sindonews')->name('admin.rss.sindonews');

Route::get('/sparql', 'Admin\RssController@sparqlPerson')->name('admin.sparql.index');
Route::post('/sparql', 'Admin\RssController@sparqlUpdate')->name('admin.sparql.update');

Route::post('/sparqldel', 'Admin\RssController@sparqlDelete')->name('admin.sparql.delete');

Route::post('/sparqlc', 'Admin\RssController@construct')->name('admin.construct.update');

Route::post('/sparqld', 'Admin\RssController@describe')->name('admin.describe.update');

Route::post('/sparqladc', 'Admin\RssController@ask')->name('admin.ask.update');

Route::get('/family', 'Admin\FamilyController@index')->name('admin.family.family');
Route::get('/family/{id}', 'Admin\FamilyController@details')->name('admin.family.detail');
Route::get('/family/show/{id}', 'Admin\FamilyController@show')->name('admin.family.show');
Route::post('/family', 'Admin\FamilyController@update')->name('admin.family.update');
Route::delete('/family/delete/{id}','Admin\FamilyController@delete')->name('admin.family.delete');


Route::get('/jemaat', 'Admin\JemaatController@index')->name('admin.jemaat.jemaat');
Route::get('/jemaat/{id}', 'Admin\JemaatController@details')->name('admin.jemaat.detail');
Route::post('/jemaat', 'Admin\JemaatController@update')->name('admin.jemaat.update');
Route::delete('/jemaat/delete/{id}','Admin\JemaatController@delete')->name('admin.jemaat.delete');

	
Route::get('/family.xml', 'SitemapController@indexFamily');


Route::get('/jemaat.xml', 'SitemapController@indexJemaat');
