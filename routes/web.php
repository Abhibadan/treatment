<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home;
use App\Http\Controllers\sign_up;
use App\Http\Controllers\user_signup;
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

Route::get('/',[home::class,'welcome'])->name('home');
Route::get('sign_up/', sign_up::class)->name('sign_up');
Route::get('sign_up/patient',[user_signup::class,'patient_signup'])->name('patient_signup');
Route::get('sign_up/doctor',[user_signup::class,'doctor_signup'])->name('doctor_signup');
Route::post('sign_up/patient',[user_signup::class,'patient_register'])->name('patient_register');
Route::post('sign_up/doctor',[user_signup::class,'doctor_register'])->name('doctor_register');