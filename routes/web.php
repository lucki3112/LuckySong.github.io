<?php

use App\Http\Controllers\myapp_oops;
use App\Http\Controllers\ProfileController;
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

Route::get('/',[myapp_oops::class,'home'])->name('home');
Route::post('/',[myapp_oops::class,'home'])->name('search_home');
Route::get('/song_play/{id}',[myapp_oops::class,'songPlay'])->name('song_play');
Route::get('/login',[myapp_oops::class,'login'])->name('login')->middleware('alreadyLoggedIn');
Route::post('/login',[myapp_oops::class,'loginUser'])->name('client.login');
Route::get('/registration',[myapp_oops::class,'registration'])->name('registration');
Route::post('/registration',[myapp_oops::class,'registerUser'])->name('client.store');
Route::get('/dashboard',[myapp_oops::class,'dashboard'])->middleware('isLoggedIn')->name('client.dashboard');
Route::get('/logout',[myapp_oops::class,'logout'])->name('client.logout');
Route::get('/admin',[myapp_oops::class,'admin'])->name('admin')->middleware('adminAlreadyLoggedIn');
Route::post('/admin',[myapp_oops::class,'admin_login'])->name('admin_login');
Route::get('/profile',[myapp_oops::class,'profile'])->middleware('adminLoggedIn')->name('profile');
Route::get('/admin_logout',[myapp_oops::class,'admin_logout'])->name('admin_logout');
Route::get('/add_song',function(){
    return view('add_song');
})->middleware('adminLoggedIn')->name('add_song');
Route::post('/profile',[myapp_oops::class,'register'])->name('song.register');