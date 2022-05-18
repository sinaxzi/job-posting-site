<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/',[JobController::class,'index'])->name('home');

Route::get('jobs/create',[JobController::class,'create'])->name('job.create')->middleware('auth');

Route::get('/jobs/{job}',[JobController::class,'show'])->name('job.show');

Route::post('/jobs',[JobController::class,'store'])->name('job.store')->middleware('auth');

Route::get('/jobs/{job}/edit',[JobController::class,'edit'])->name('job.edit')->middleware('auth');

Route::patch('/jobs/{job}/update',[JobController::class,'update'])->name('job.update')->middleware('auth');

Route::delete('/jobs/{job}/delete',[JobController::class,'destroy'])->name('job.delete')->middleware('auth');

Route::get('/user/{user}/manage',[JobController::class,'manage'])->name('job.manage')->middleware('auth');

Route::get('/register',[RegisterController::class,'index'])->name('register')->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);

Route::post('/logout',[LogoutController::class,'store'])->name('logout')->middleware('auth');

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('login',[LoginController::class,'store']);








