<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\roomController;
// use App\Http\Controllers\RoomController as ControllersRoomController;

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
Route::resource('/room', RoomController::class);
// n9edro ndiro istitna2 lxi methode ila drna ->exepted(['smiya ta3 lmethode']);