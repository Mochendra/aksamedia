<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Endpoint untuk login
Route::post('/login', [AuthController::class, 'login']);
Route::get('/divisions', [DivisionController::class, 'index']);
Route::get('/employees', [EmployeeController::class, 'index']);
Route::post('/employees', [EmployeeController::class, 'store']);