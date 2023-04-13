<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OpdrachtController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KlantenPaneelController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\App;

use App\Models\Opdracht;
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
    // Profiel
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Opdrachten
    Route::get('/opdrachten', [OpdrachtController::class, 'list'])->name('opdracht.list');
    Route::get('/opdracht/aanmaken', [OpdrachtController::class, 'create'])->name('opdracht.create');
    Route::post('/opdracht/store', [OpdrachtController::class, 'store'])->name('opdracht.store');
    Route::delete('/opdracht/verwijderen', [OpdrachtController::class, 'verwijderen'])->name('opdracht.verwijderen');
    Route::get('/opdracht/{opdracht}/bewerken/', [OpdrachtController::class, 'bewerken'])->name('opdracht.bewerken');
    Route::patch('/opdracht/update', [OpdrachtController::class, 'update'])->name('opdracht.update');

    // Agenda
    Route::get('/agenda', [OpdrachtController::class, 'calendar'])->name('calendar');
   
    // Gebruikers
    Route::get('/gebruikers', [UserController::class, 'lijst'])->name('gebruiker.lijst');
    Route::get('/gebruikers/toevoegen', [UserController::class, 'toevoegen'])->name('gebruiker.toevoegen');
    Route::post('/gebruikers/toevoegen', [UserController::class, 'create'])->name('gebruiker.create');
    Route::delete('/gebruikers/verwijderen', [UserController::class, 'destroy'])->name('gebruiker.destroy');


    Route::get('/klantenpaneel/mijn-gegevens', [KlantenPaneelController::class, 'gegevens'])->name('klantenpaneel.gegevens');

});

require __DIR__.'/auth.php';
