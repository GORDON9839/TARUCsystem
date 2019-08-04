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
Route::resource('registration','Auth\RegisterController');
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

Route::resource('staffhome','staffhomeController');
//only authenticated user can access this file
Route::group(['middleware'=>'auth'],function(){
    Route::get('/faculty/faculty_adminhomepage',function(){
        return view('/faculty/faculty_adminhomepage');
    })->name('faculty.adminpage');
    Route::get('/faculty/faculty_staffhomepage',function(){
        return view('/faculty/faculty_staffhomepage');
    })->name('faculty.staffpage');
    Route::get('/department/department_adminhomepage',function(){
        return view('department/department_adminhomepage');
    })->name('department.adminpage');
    Route::get('/department/department_staffhomepage',function(){
        return view('department/department_staffhomepage');
    })->name('department.staffpage');
    Route::get('programme',function(){
        return view('accommodation_create');
    })->name('programme');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
