<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;




    Route::get('/class', [ClassController::class, 'index']);
    Route::get('/subject', [SubjectController::class, 'index']);
    Route::get('/task', [TaskController::class, 'index']);
    

