<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('projects', ProjectController::class);
Route::resource('skills', SkillController::class);
Route::resource('profile', ProfileController::class);
Route::get('/profile/create-default', [ProfileController::class, 'createDefault'])->name('profile.create-default');

Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
Route::patch('/messages/{message}/mark-as-read', [MessageController::class, 'markAsRead'])->name('messages.mark-as-read');
Route::patch('/messages/{message}/mark-as-unread', [MessageController::class, 'markAsUnread'])->name('messages.mark-as-unread');
Route::patch('/messages/mark-all-as-read', [MessageController::class, 'markAllAsRead'])->name('messages.mark-all-as-read');
Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
Route::delete('/messages', [MessageController::class, 'deleteAll'])->name('messages.delete-all');
