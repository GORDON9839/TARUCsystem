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
use App\accommodation;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('accommodations','accommodationsController');
Route::resource('programmes','programmesController');
Route::get('programme',function(){
    return view('accommodation_create');
});
Route::resource('staffhome','staffhomeController');

//Hawman's part below

//Route::resource('userviewprogrammes', 'user_viewprogrammes');
Route::resource('userProgrammesController', 'userProgrammesController');
//Route::view('/user_shortlistfilter', 'user_shortlistfilter');

Route::resource('userShortlistfilterController', 'userShortlistfilterController');
Route::resource('userCompareselectController', 'userCompareselectController');
Route::resource('userCompareresultController', 'userCompareresultController');

//Route::get('userviewprogrammes', function(){
//    return view('user/user_viewprogrammes');
//});

