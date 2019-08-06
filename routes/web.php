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
Route::resource('faculty','FacultiesController');
Route::resource('facility','facilities_listsController');
Route::resource('department','DepartmentController');
Route::resource('levelstudy','level_of_studiesController');
Route::resource('loan','loansController');
Route::resource('fee','setfeeController');
Route::resource('loanlist','loanlistController');
Route::resource('campus','campusesController');
Route::resource('accommodation','accommodationsController');
Route::get('programme',function(){
    return view('accommodation_create');
});
Route::resource('staffhome','staffhomeController');
