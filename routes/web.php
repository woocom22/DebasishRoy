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


// Ajax call routes section
Route::get('/hero-data',[HomeController::class,'heroData']);
Route::get('/hero-data',[HomeController::class,'aboutData']);
Route::get('/social-data',[HomeController::class,'socialData']);
Route::get('/project-details',[ProjectController::class,'projectData']);
Route::get('/resume-link',[ResumeController::class,'resumeLink']);
Route::get('/experiencesData',[ResumeController::class,'experiencesData']);
Route::get('/educationData',[ResumeController::class,'educationData']);
Route::get('/skillData',[ResumeController::class,'skillData']);
Route::get('/languageData',[ResumeController::class,'languageData']);
Route::get('/contactRequest',[ContactController::class,'contactRequest']);

