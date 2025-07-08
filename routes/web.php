<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\ApiController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/user-info', [ApiController::class, 'userInfo']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/auth/google/redirect', [SocialiteController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [SocialiteController::class, 'callback'])->name('google.callback');

Route::get('/debug-session', function () {
    return [
        'default_guard' => config('auth.defaults.guard'),
        'current_guard_driver' => app('auth')->guard()->getName(), // returns "web"
        'guard_instance' => get_class(app('auth')->guard()),
        'user' => auth()->user(),
    ];
});
