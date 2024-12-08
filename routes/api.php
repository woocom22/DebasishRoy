<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResumeController;

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
