<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('members', MemberController::class);

// Ruta pentru afișarea listei de evenimente
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Ruta pentru afișarea formularului de creare a unui eveniment
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

// Ruta pentru salvarea unui eveniment nou
Route::post('/events', [EventController::class, 'store'])->name('events.store');

// Ruta pentru afișarea formularului de editare a unui eveniment existent
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');

// Ruta pentru salvarea modificărilor unui eveniment
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/members/export', [MemberController::class, 'exportCSV'])->name('members.export');

require __DIR__.'/auth.php';
