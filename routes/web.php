<?php


use Illuminate\Http\Request;
use Illuminate\Http\Response;
//
//Route::get('/', function () {
//    return view('welcome');
//});
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//
//Route::get('/express', function (Request $request, Response $response) {
//    return view('welcome')->with('data', $request->get('data'));
//});

Route::get('/{any}', 'SpaController@index')->where('any', '.*');
