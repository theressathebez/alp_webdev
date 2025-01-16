<?php

use App\Http\Controllers\LeaderAuthController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TeamController;
use App\Http\Middleware\LeaderAuth;
use App\Models\Leader;
use App\Models\Participant;
use Illuminate\Support\Facades\Route;

//routes normal 
Route::get('/home', [ProjectController::class, 'indexCompetition'])->name('home');
Route::get('/competition', [ProjectController::class, 'showCategory'])->name('competition');
Route::get('/result', [ProjectController::class, 'showResult'])->name('Result');

//routes untuk login leader
Route::get('login', [LeaderAuthController::class, 'showLoginForm'])->name('leader.login.get');
Route::post('login', [LeaderAuthController::class, 'login'])->name('leader.login.post'); 
Route::post('logout', [LeaderAuthController::class, 'logout'])->name('leader.logout');



//routes bawaan Breeze
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(LeaderAuth::class)->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/participant/create', [ParticipantController::class, 'create'])->name('participant.create');
    // Route::get('/participant/{participant}', [ParticipantController::class, 'show'])->name('participant.show');
});


//Routes untuk HTTP Request kalo VP
Route::resource("/participant", ParticipantController::class);
Route::resource("/leader", LeaderController::class);
Route::resource("/team", TeamController::class);
Route::resource("/registration", RegistrationController::class);


// require __DIR__.'/auth.php';