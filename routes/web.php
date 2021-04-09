<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userauthcontroller;
//use App\Http\Controllers\admincontroller;
use App\Http\Middleware\routecheck;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/login",[userauthcontroller::class,'login'])->middleware('back');

Route::get("/register",[userauthcontroller::class,'register'])->middleware('islogged');

Route::post("/create",[userauthcontroller::class,'create'])->name('auth.create');

Route::post("/check",[userauthcontroller::class,'check'])->name('auth.check');

Route::get("/profile",[userauthcontroller::class,'profile'])->middleware('check');

Route::get("/profileuser",[userauthcontroller::class,'profileuser'])->middleware('islogged');

Route::get("/assignwork",[userauthcontroller::class,'assign'])->middleware('islogged');

Route::post("/work",[userauthcontroller::class,'work'])->name('user.work');

Route::get("/edit/{id}",[userauthcontroller::class,'edit']);

Route::post("/update",[userauthcontroller::class,'update'])->name('user.update');

Route::get("/delete/{id}",[userauthcontroller::class,'destroy']);

Route::get("/add",[userauthcontroller::class,'add']);

Route::post("/added",[userauthcontroller::class,'added'])->name('user.addwork');

Route::get("/status",[userauthcontroller::class,'status'])->middleware('check');



Route::get("/logout",[userauthcontroller::class,'logout']);

//Route::resource('profile', 'admincontroller');



