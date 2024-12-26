<?php

use App\Http\Controllers\ProjectController;

use Illuminate\Support\Facades\Route;


Route::get('/home', [ProjectController::class, 'indexCompetition'])->name('home');
Route::get('/competition', [ProjectController::class, 'showCategory'])->name('competition');
Route::get('/result', [ProjectController::class, 'showResult'])->name('Result');
Route::post('/register', [ProjectController::class, 'register'])->name('register');
Route::get('/account', [ProjectController::class, 'indexParticipant'])->name('account');


// Route::get('/', function () {
//     return view('home',[
//         'title' => 'Home'
//     ]);
// });

Route::get('/register', function () {
    return view('register');
});


Route::get('/login', function () {
    return view('login');
});
