<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Site;

Route::get('/', [Site\HomeController::class, 'index']);

Route::prefix('/painel')->group(function(){
    Route::get('/', [Admin\HomeController::class, 'index'])->name('admin');

    Route::get('login', [Admin\Auth\LoginController::class, 'index'])->name('login');

    Route::post('login', [Admin\Auth\LoginController::class, 'authenticate']);

    Route::get('register', [Admin\Auth\RegisterController::class, 'index'])->name('register');

    Route::post('register', [Admin\Auth\RegisterController::class, 'register']);

    Route::post('logout', [Admin\Auth\LoginController::class, 'logout'])->name('logout');

    Route::resource('users', Admin\UserController::class);

    Route::get('profile', [Admin\ProfileController::class, 'index'])->name('profile');

    Route::put('profilesave', [Admin\ProfileController::class, 'save'])->name('profile.save');

    Route::get('settings', [Admin\SettingController::class, 'index'])->name('settings');

    Route::put('settingssave', [Admin\SettingController::class, 'save'])->name('settings.save');

    Route::resource('pages', Admin\PageController::class);
});

Route::fallback([Site\PageController::class, 'index']);


