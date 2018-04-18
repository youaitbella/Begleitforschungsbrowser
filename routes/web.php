<?php

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
Route::middleware(['AgreementController'])->group(function() {
    Route::get('/{table}/{dataYear}', 'TableController@getTable')->name('table.route');
    Route::get('/database/{table}/{dataYear}', 'TableController@getTable')->name('database.index');
    Route::get('/structure/{table}/{dataYear}', 'TableController@getTable')->name('structur.index');
    Route::get('/full/ha/demo/{table}/{dataYear}', 'TableController@getTable')->name('full.ha.demo');
    Route::get('/full/ha/kh/{table}/{dataYear}', 'TableController@getTable')->name('full.ha.kh');
    Route::get('/full/ha/demo/main/{table}/{dataYear}', 'TableController@getTable')->name('full.ha.kh.main');
    Route::get('/full/ha/demo/proc/{table}/{dataYear}', 'TableController@getTable')->name('full.ha.kh.proc');
    Route::get('/full/bv/demo/{table}/{dataYear}', 'TableController@getTable')->name('full.bv.demo');
    Route::get('/full/bv/kh/{table}/{dataYear}', 'TableController@getTable')->name('full.bv.kh');
    Route::get('/full/bv/demo/main/{table}/{dataYear}', 'TableController@getTable')->name('full.bv.kh.main');
    Route::get('/full/bv/demo/proc/{table}/{dataYear}', 'TableController@getTable')->name('full.bv.kh.proc');

    Route::get('/part/hd/{table}/{dataYear}', 'TableController@getTable')->name('part.hd');
    Route::get('/part/proc/{table}/{dataYear}', 'TableController@getTable')->name('part.proc');

    Route::get('/gdrg/ha/{table}/{dataYear}', 'TableController@getTable')->name('gdrg.ha');
    Route::get('/gdrg/bv/{table}/{dataYear}', 'TableController@getTable')->name('gdrg.bv');


    Route::get('download/data/{dataYear}', 'DownloadController@downloadData')->name('download.data');

    Route::get('/', 'AgreementController@index');
});

Route::get('download/manual/{dataYear}', 'DownloadController@downloadManual')->name('download.manual');
Route::get('/agreement', 'AgreementController@getAgreemend')->name('agree');
Route::post('/agreement', 'AgreementController@agree');
Route::get('/error404', 'ErrorController@get404')->name('404');
