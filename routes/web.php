<?php

use App\Http\Controllers\LeaderAuthController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TeamController;
use App\Models\Leader;
use App\Models\Participant;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [ProjectController::class, 'indexCompetition'])->name('home');
Route::get('/competition', [ProjectController::class, 'showCategory'])->name('competition');
Route::get('/result', [ProjectController::class, 'showResult'])->name('Result');

Route::get('login', [LeaderAuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [LeaderAuthController::class, 'login'])->name('leader.login');
Route::post('logout', [LeaderAuthController::class, 'logout'])->name('logout');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource("/participant", ParticipantController::class);
Route::resource("/leader", LeaderController::class);
Route::resource("/team", TeamController::class);



require __DIR__.'/auth.php';
