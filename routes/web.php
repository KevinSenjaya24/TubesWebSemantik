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


