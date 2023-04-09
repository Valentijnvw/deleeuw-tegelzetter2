<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OpdrachtController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\App;
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

App::setLocale('nl');

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
    Route::post('/opdracht/store', [OpdrachtController::class, 'store'])->name('opdracht.store');
    Route::post('/opdracht/verwijderen', [OpdrachtController::class, 'delete'])->name('opdracht.delete');
    

    Route::get('/agenda', [OpdrachtController::class, 'calendar'])->name('calendar');
   
    Route::get('/gebruikers', [UserController::class, 'lijst'])->name('gebruiker.lijst');
    Route::get('/gebruikers/toevoegen', [UserController::class, 'toevoegen'])->name('gebruiker.toevoegen');
    Route::post('/gebruikers/toevoegen', [UserController::class, 'create'])->name('gebruiker.create');
});

require __DIR__.'/auth.php';
