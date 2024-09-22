<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'loginPage']);
Route::get('/register', [UserController::class, 'signUpPage']);
Route::post('/user', [UserController::class, 'register']);
Route::post('/user/login', [UserController::class, 'login']);
Route::get('/home', [UserController::class , 'homePage']);
