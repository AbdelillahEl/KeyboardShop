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

// User Routes
Route::controller(UserController::class)->group(function () {
    // Show Reset
    Route::get('/reset', 'reset');
    // Reset Password
    Route::post('/reset', 'resetPassword');
    // Show Registration Form
    Route::get('/register', 'create')->middleware('guest');
    // Create New User
    Route::post('/users', 'store');
    // Logout
    Route::post('/logout', 'logout')->middleware('auth');
    // Show Profile Page
    Route::get('/profile/{user}', 'profile');
    // Show Profile Edit Page
    Route::get('/profile/{user}/edit', 'edit')->middleware('auth');
    // Update Profile Page
    Route::put('/profile/{user}', 'update')->middleware('auth');
    // Add user to admin
    Route::post('/users/addAdmin', 'addAdmin')->name('users.addAdmin');
});

// Authentication Routes
Route::controller(UserController::class)->middleware('guest')->group(function () {
    // Show Login Form
    Route::get('/login', [KeyboardController::class, 'login'])->name('login');
    // Login
    Route::post('/login', 'authenticate');
});

// Contact Routes
Route::controller(ContactController::class)->group(function () {
    // Show Contact Form
    Route::get('/contact', 'create');
    // Send Contact Form
    Route::post('/contact', 'store');
});

// Faq Routes
Route::controller(FaqController::class)->group(function () {
    // Show Faq
    Route::get('/faq', 'show');

    // Admin Faq Routes
    Route::middleware(['auth', 'role:admin'])->group(function () {
        // Show Faq Edit
        Route::get('/faq/{faq}/edit', 'showFaqEdit');
        // Edit Faq
        Route::put('/faq/{faq}', 'updateFaq');
        // Delete Faq
        Route::delete('/faq/{faq}', 'destroyFaq');
    });
});

// Keyboard Routes
Route::controller(KeyboardController::class)->group(function () {
    // Single Keyboard
    Route::get('/keyboard/{keyboard}', 'show');

    // Admin Keyboard Routes
    Route::middleware(['auth', 'role:admin'])->group(function () {
        // Show Create Form
        Route::get('/keyboard/create', 'create');
        // Store Keyboard
        Route::post('/keyboard', 'store');
        // Manage Keyboards
        Route::get('/manage/keyboard', 'manage');
        // Delete Keyboard
        Route::delete('/keyboard/delete/{keyboard}', 'destroyKeyboard');
        // Edit Keyboard Submit to Update
        Route::put('/keyboard/{keyboard}', 'update');
        // Show Edit Form
        Route::get('/keyboard/{keyboard}/edit', 'edit');
    });
});

// Static Pages
Route::get('/about', function () {
    return view('about');
});
