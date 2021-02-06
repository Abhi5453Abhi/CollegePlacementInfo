<?php

use App\Http\Controllers\placement_controller;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => "web"],function(){
    Route::get('/',[placement_controller::class,'list_graph']);
    Route::get('/list',[placement_controller::class,'list']);
    Route::view('register','register');
    Route::post('/register',[placement_controller::class,'register']);
    Route::view('login','login');
    Route::post('/login',[placement_controller::class,'login']);
    Route::get('/list_graph',[placement_controller::class,'list_graph']);
    Route::post('add',[placement_controller::class,'add']);
    Route::view('add','add');
    Route::get('/delete/{id}',[placement_controller::class,'delete']);
    Route::get ('/edit/{email}',[placement_controller::class,'edit']);
    Route::post('edit',[placement_controller::class,'update']);
});
Route::post('upload',[placement_controller::class,'upload']);


