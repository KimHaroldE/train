<?php

use App\Http\Controllers\ticketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\TrainController;

Route::get('/',[AuthController::class, 'index'])->name('login');
    
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');   
Route::post('/register', [AuthController::class, 'store'])->name('register.post');

Route::get('/dashboard',[PassengerController::class, 'dashboard'])->name('dashboard');
Route::post('/dashboard',[PassengerController::class, 'book'])->name('book.ticket');

Route::get('/trains', [TrainController::class, 'index'])->name('trains');