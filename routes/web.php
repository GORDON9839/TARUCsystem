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
    return view('user\homepage');
});

//go controller
Route::get('user_home',function(){
    return view('user\homepage');
})->name('user_home');

Route::resource('staffhome','staffhomeController');

//Hawman's part below
Route::resource('userProgrammesController', 'userProgrammesController');
Route::resource('userShortlistfilterController', 'userShortlistfilterController');
Route::resource('userCompareselectController', 'userCompareselectController');
Route::resource('userCompareresultController', 'userCompareresultController');

Route::get('/faculty/faculty_adminhomepage',function(){
    return view('/faculty/faculty_adminhomepage');
})->name('faculty.adminpage');

//for login
Route::post('/login/custom',
    ['uses' =>'Auth\LoginController@login',
        'as' =>'login.custom']);

//only authenticated user can access these file

Route::group(['middleware'=>'auth'],function(){
    Route::get('users/all',"userControllers@getstaffByType");
    Route::get('faculty/desc',"FacultiesController@getFacultyDescription");
    Route::resource('programmes','programmesController');
    Route::resource('subject','subjectsController');
    Route::resource('accommodations','accommodationsController');
    Route::resource('registration','Auth\RegisterController');
    Route::resource('structure','structuresController');
    Route::resource('curriculum','curriculumsController');
    Route::resource('allstructure','allstructureController');
    Route::resource('campusoffered','programme_listsController');
    Route::resource('managestaff','userControllers');
    Route::resource('manage_facultystaff','faculty_staffController');
    Route::resource('faculty','FacultiesController');
    Route::resource('facility','facilities_listsController');
    Route::resource('department','DepartmentController');
    Route::resource('levelstudy','level_of_studiesController');
    Route::resource('loan','loansController');
    Route::resource('fee','setfeeController');
    Route::resource('loanlist','loanlistController');
    Route::resource('campus','campusesController');
    Route::resource('accommodation','accommodationsController');
});
//Authentication route
Auth::routes();
Auth::routes(['register' => false]);



