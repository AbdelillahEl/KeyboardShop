<?php

use App\Models\Keyboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KeyboardController;

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

Route::get('/keyboard/create', [KeyboardController::class, 'create'])->middleware('auth');


// Store Keyboard
Route::post('/keyboard', [KeyboardController::class, 'store']);



// Show Edit Form

Route::get('/keyboard/{keyboard}/edit', [KeyboardController::class, 'edit'])->middleware('auth');


// Edit Keyboard Submit to Update

Route::put('/keyboard/{keyboard}', [KeyboardController::class, 'update'])->middleware('auth');

// Delete Keyboard
Route::post('/keyboard/{keyboard}', [KeyboardController::class,'destroy'])->middleware('auth');


//Show Registration Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class,'store']);

//Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
//Show Login Form
Route::get('/login', [KeyboardController::class,'login'])->name('login')->middleware('guest');
//Login
Route::post('/login', [UserController::class, 'authenticate']);

//Manage Keyboards
Route::get('/keyboard/manage', [KeyboardController::class, 'manage'])->middleware('auth');

// Single Keyboard
Route::get('/keyboard/{keyboard}', [KeyboardController::class, 'show']);

