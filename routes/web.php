<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;

Route::get('/agenda', [AgendaController::class, 'index']);
Route::get('/agenda/day', [AgendaController::class, 'show']);
Route::post('/agenda', [AgendaController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});
