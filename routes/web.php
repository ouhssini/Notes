<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;



Route::get('/', function () {
    return view('welcome');
})->name('homepage');
Route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class, 'show'])->name('loginForm');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});
Route::middleware(['auth','verified' ])->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/note/deleted',[NoteController::class,'deleted'])->name('note.deleted');
    Route::post('/note/{id}/restore',[NoteController::class,'restore'])->name('note.restore');
    Route::resource('note', NoteController::class);
});
