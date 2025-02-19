<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\roomController;
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


    // dump($person);hiya var_dump
    // dd($person);hiya var_dump and die

Route::view('/about', 'about');
Route::controller(roomController::class)->group(function(){
    Route::get('/room', 'index');
});
