<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\userController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;

// This section is for page route
Route::get('/',[HomeController::class,'page']);
Route::get('/contact',[ContactController::class,'page']);
Route::get('/project',[ProjectController::class,'page']);
Route::get('/resume',[ResumeController::class,'page']);

// User Route for registration, login, Authentication by OTP
Route::post('/user-registration',[userController::class,'userRegister']);
Route::post('/user-login',[userController::class,'userLogin']);
Route::post('/send-otp',[userController::class,'SendOTPCode']);
Route::post('/verify-otp',[userController::class,'VerifyOTP']);
Route::post('/reset-password',[userController::class,'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);


