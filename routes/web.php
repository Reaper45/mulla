<?php


use Illuminate\Http\Request;
use Illuminate\Http\Response;

//Auth::routes();

Route::get('/{any}', 'SpaController@index')->where('any', '.*');
