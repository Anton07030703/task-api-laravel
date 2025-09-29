<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
Route::get('/tasks',[TaskController::class,'index']);
Route::get('/tasks/{task}',[TaskController::class,'show']);
Route::post('/tasks',[TaskController::class,'create']);
Route::put('/tasks/{task}',[TaskController::class,'update']);
Route::delete('/tasks/{task}',[TaskController::class,'destroy']);