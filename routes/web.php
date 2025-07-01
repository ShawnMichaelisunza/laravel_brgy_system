<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(AdminController::class)->group(function(){

    Route::get('/dashboard', 'index')->name('dashboard')->middleware('auth');
});

Route::controller(UserController::class)->group(function(){

    // ----------- login and register
    Route::get('/login', 'login')->name('login');
    Route::post('/login-store', 'store')->name('user.store');

    Route::get('/register', 'register')->name('register');
    Route::post('/register-create', 'create')->name('user.create');

    Route::get('/logout', 'logout')->name('logout');

    // ------ users dashboard

    Route::get('/users', 'index')->name('user.index');

    // profile user
    Route::get('/profile/{id}', 'profile')->name('user.profile');

});

Route::controller(AuthController::class)->group(function () {
    Route::get('/auth', 'index')->name('auth.index');

    Route::get('/auth/create', 'create')->name('auth.create');
    Route::post('/auth/store', 'store')->name('auth.store');

    Route::get('/auth/view/{id}', 'view')->name('auth.view');

    Route::get('/auth/edit/{id}', 'edit')->name('auth.edit');
    Route::put('/auth/update/{id}', 'update')->name('auth.update');

    Route::delete('/auth/destroy/{id}', 'destroy')->name('auth.destroy');
});
