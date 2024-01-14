<?php

use App\Models\Keyboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\KeyboardController;
use App\Models\Faq;

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
//Show Contact Form
Route::get('/contact', [ContactController::class, 'create'])->middleware('auth');
//Send Contact Form
Route::post('/contact', [ContactController::class, 'store']);
//Show Profile Page
Route::get('/profile/{user}', [UserController::class, 'profile']);
//Show Profile Edit Page
Route::get('/profile/{user}/edit', [UserController::class, 'edit'])->middleware('auth');
//Update Profile Page
Route::put('/profile/{user}', [UserController::class, 'update'])->middleware('auth');
//Show Faq
Route::get('/faq', [FaqController::class, 'show']);




//Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
//Show Faq edit
Route::get('/faq/{faq}/edit', [FaqController::class, 'showFaqEdit']);
//Edit Faq
Route::put('/faq/{faq}', [FaqController::class, 'updateFaq']);
//Delete Faq
Route::delete('/faq/{faq}', [FaqController::class, 'destroyFaq']);
// Show Create Form
Route::get('/keyboard/create', [KeyboardController::class, 'create'])->middleware('auth');
// Store Keyboard
Route::post('/keyboard', [KeyboardController::class, 'store']);
//Manage Keyboards
Route::get('/keyboard/manage', [KeyboardController::class, 'manage'])->middleware('auth');
// Delete Keyboard
Route::post('/keyboard/{keyboard}', [KeyboardController::class,'destroy'])->middleware('auth');
// Edit Keyboard Submit to Update
Route::put('/keyboard/{keyboard}', [KeyboardController::class, 'update'])->middleware('auth');
// Show Edit Form
Route::get('/keyboard/{keyboard}/edit', [KeyboardController::class, 'edit'])->middleware('auth');
// Delete Keyboard
Route::post('/keyboard/{keyboard}', [KeyboardController::class,'destroyKeyboard'])->middleware('auth');
// Show Edit Form
Route::get('/keyboard/{keyboard}/edit', [KeyboardController::class, 'edit'])->middleware('auth');
// Show Create For
Route::get('/keyboard/create', [KeyboardController::class, 'create'])->middleware('auth');
});



// Single Keyboard
Route::get('/keyboard/{keyboard}', [KeyboardController::class, 'show']);

