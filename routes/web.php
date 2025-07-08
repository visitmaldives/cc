<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\ApiController;



Route::get('/', function () {
    return redirect()->route('login');
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
    $defaultGuardName = config('auth.defaults.guard');
    $currentGuard = app('auth')->guard();
    $guardConfig = config("auth.guards.{$defaultGuardName}");

    return [
        'default_guard' => $defaultGuardName,
        'default_guard_config' => $guardConfig,
        'guard_instance_class' => get_class($currentGuard),
        'session_id' => session()->getId(),
        'session' => session()->all(),
        'user' => auth()->user(),
    ];
});
