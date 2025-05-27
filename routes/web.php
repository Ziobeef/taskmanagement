<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;




Route::get('/class', [ClassController::class, 'index']);
Route::post('/class/create', [ClassController::class, 'create']);
Route::get('/class/delete/{id}', [ClassController::class, 'delete']);
Route::post('/class/update/{id}', [ClassController::class, 'update']);
Route::get('/subject', [SubjectController::class, 'index']);
Route::post('/subject/create', [SubjectController::class, 'create']);
Route::get('/subject/delete/{id}', [SubjectController::class, 'delete']);
Route::post('/subject/update/{id}', [SubjectController::class, 'update']);

Route::get('/task', [TaskController::class, 'index']);
Route::post('/task/create', [TaskController::class, 'create']);
Route::get('/task/delete/{id}', [TaskController::class, 'delete']);
Route::post('/task/update/{id}', [TaskController::class, 'update']);

