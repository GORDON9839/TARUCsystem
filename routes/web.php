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

Route::resource('accommodation','accommodationsController');
Route::resource('programmes','programmesController');
Route::resource('subject','subjectsController');
Route::resource('structure','structuresController');
Route::resource('curriculum','curriculumsController');
Route::resource('allstructure','allstructureController');
Route::resource('campusoffered','programme_listsController');
Route::resource('campus','campusesController');
Route::resource('testCont','testingController');
Route::get('test',function(){
    return view('faculty/testing');
});
//Route::post('redirecttostructure',function(Request $request){
//    return redirect()->route('structuresController@show',[$request->get('subject')]);
//});
Route::resource('staffhome','staffhomeController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
