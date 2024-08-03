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
    Route::get('signup',[UserController::class, 'signupForm'])->name('signupForm');
    Route::post('signup',[UserController::class, 'signup'])->name('signup');
});
Route::middleware(['auth','unverified' ])->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/note/deleted',[NoteController::class,'deleted'])->name('note.deleted');
    Route::post('/note/{id}/restore',[NoteController::class,'restore'])->name('note.restore');
    Route::post('/note/deleted/{id}',[NoteController::class,"forceDelete"])->name('note.forcedelete');
    Route::post('/note/deleteAll',[NoteController::class,"deleteAll"])->name('note.deleteAll');
    Route::resource('note', NoteController::class);
});

Route::get('/verify',function(){
return 'please verify your email address';
})->name("verification.notice")->middleware(['unverified']);
