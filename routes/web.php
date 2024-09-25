<?php

use App\Http\Controllers\JobControler;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');
Route::resource('jobs', JobControler::class);
