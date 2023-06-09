<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MoneybirdController;
// use App\Http\Controllers\Api\CalendarEventController;
use App\Http\Controllers\OpdrachtController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/moneybird-test", [MoneybirdController::class, 'userSearch']);

Route::get('/getOpdrachten', [OpdrachtController::class, 'getOpdrachten'])->name('api.getOpdrachten');

Route::get("/calendar/opdrachten", [OpdrachtController::class, 'getCalendarOpdrachten'])->name('api.calendar.opdrachten');