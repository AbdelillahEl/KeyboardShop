<?php

use App\Http\Controllers\KeyboardController;
use Illuminate\Support\Facades\Route;
use App\Models\Keyboard;

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

Route::get('/', [KeyboardController::class, 'index']);

// Show Create Form

Route::get('/keyboard/create', [KeyboardController::class, 'create']);


// Store Keyboard
Route::post('/keyboard', [KeyboardController::class, 'store']);









// Single Keyboard
Route::get('/keyboard/{keyboard}', [KeyboardController::class, 'show']);