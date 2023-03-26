<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OpdrachtController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return Redirect::to('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/opdrachten', [OpdrachtController::class, 'list'])->name('opdracht.list');
    Route::get('/opdracht/aanmaken', [OpdrachtController::class, 'create'])->name('opdracht.create');
    
    Route::post('/opdracht/verwijderen', [OpdrachtController::class, 'delete'])->name('opdracht.delete');

    Route::get('/opdrachten-kalender', [OpdrachtController::class, 'calendar'])->name('calendar');
    
});

require __DIR__.'/auth.php';
