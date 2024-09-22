<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;

Route::get('/', [UserController::class, 'loginPage']);
Route::get('/register', [UserController::class, 'signUpPage']);
Route::post('/user', [UserController::class, 'register']);
Route::post('/user/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

Route::get('/home', [EventController::class , 'index']);
Route::post('/event/{id}', [EventController::class, 'register']);
