<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/projects', [ProjectController::class, 'apiIndex']);
Route::get('/skills', [SkillController::class, 'apiIndex']);
Route::get('/profile', [ProfileController::class, 'apiIndex']);

// Contact form messages
Route::post('/contact', [MessageController::class, 'apiStore']);
