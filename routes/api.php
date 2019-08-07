<?php

use Illuminate\Http\Request;
use App\subject;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('subject',function(){
//    return subject::all();
//});
//Route::get('subject/{subject_id}',function($id){
//    return subject::find($id);
//});
//Route::post('subject',function(Request $request){
//    return subject::create($request->all());
//});
//Route::put('subject/{subject_id}',function(Request $request,$id){
//    $subject = Article::findOrFail($id);
//    $subject->update($request->all());
//
//    return $subject;
//});
//Route::delete('subject/{subject_id}',function($id){
//    $subject::find($id)->delete();
//
//    return 204;
//});
Route::get('subject', 'subjectsController@index');
Route::get('subject/{subject}', 'subjectsController@show');
Route::post('subject', 'subjectsController@store');
Route::put('subject/{subject}', 'subjectsController@update');
Route::delete('subject/{subject}', 'subjectsController@delete');
