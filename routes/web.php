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
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

//go controller


Route::get('user_home',function(){
    return view('user\homepage');
})->name('user_home');
Route::get('programme',function(){
    return view('accommodation_create');
});
//for login
Route::post('/login/custom',
    ['uses' =>'Auth\LoginController@login',
        'as' =>'login.custom']);
Route::resource('staffhome','staffhomeController'); // can delete
Route::get('staff.register',function(){
    return view('register_staff');
});


//only authenticated user can access this file

Route::group(['middleware'=>'auth'],function(){
    Route::get('/faculty/faculty_adminhomepage',function(){
        return view('/faculty/faculty_adminhomepage');
    })->name('faculty.adminpage');
    Route::resource('programmes','programmesController');
    Route::resource('subject','subjectsController');
    Route::resource('accommodations','accommodationsController');
    Route::resource('registration','Auth\RegisterController');
    Route::resource('staff','userControllers');
    Route::resource('faculty_manage_staff','faculty_staffController');
    Route::resource('structure','structuresController');
    Route::resource('curriculum','curriculumsController');
    Route::resource('allstructure','allstructureController');
    Route::resource('campusoffered','programme_listsController');
    Route::resource('managestaff','userControllers');
});
//Authentication route
Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
