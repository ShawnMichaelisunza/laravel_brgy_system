<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnouncementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangayController;
use App\Http\Controllers\ClearanceController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// barangay page

Route::controller(BarangayController::class)->group(function(){

    Route::get('/', 'index')->name('brgy.index');

    Route::get('/bgry-clearance/{id}', 'clearance')->name('brgy.clearance')->middleware('auth');
    Route::post('/bgry-clearance-store', 'store')->name('brgy.clearance-store')->middleware('auth');

    Route::get('/announcement', 'announcement')->name('brgy.announcement');
    Route::get('/officer', 'officer')->name('brgy.officer');
    Route::get('/about', 'about')->name('brgy.about');
    Route::get('/contact', 'contact')->name('brgy.contact');
});

// admin page

Route::controller(AdminController::class)->group(function(){

    Route::get('/admin-dashboard', 'index')->name('dashboard')->middleware('auth');
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

    // create and store an account
    Route::get('/user-create', 'userCreate')->name('user.userCreate');
    Route::post('/user-store', 'userStore')->name('user.userStore');

    // profile user
    Route::get('/profile/{id}', 'profile')->name('user.profile');

    // edit and update an account
    Route::get('/users-edit/{id}', 'edit')->name('user.edit');
    Route::put('/users-update/{id}', 'update')->name('user.update');

    // delete an account
    Route::delete('/users-delete/{id}', 'destroy')->name('user.destroy');

    Route::get('/users-restore/{id}', 'restore')->name('user.restore');

    // view deleted accounts
    Route::get('/users-deleted', 'deleted')->name('user.deleted');

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

Route::controller(AnouncementController::class)->group(function(){

    Route::get('/announcement-admin', 'index')->name('anc.index');

    Route::post('/announcement-admin/store', 'store')->name('anc.store');

    Route::get('/announcement-admin/show/{id}', 'show')->name('anc.show');

    Route::get('/announcement-admin/edit/{id}', 'edit')->name('anc.edit');
    Route::put('/announcement-admin/update/{id}', 'update')->name('anc.update');

    Route::delete('/announcement-admin/destroy/{id}', 'destroy')->name('anc.destroy');
});

Route::controller(OfficerController::class)->group(function(){

    Route::get('/officer-admin', 'index')->name('officer.index');

    Route::post('/officer-admin/store', 'store')->name('officer.store');

    Route::get('/officer-admin/show/{id}', 'show')->name('officer.show');

    Route::get('/officer-admin/approve/{id}', 'approve')->name('officer.approve');
    Route::get('/officer-admin/cancel/{id}', 'cancel')->name('officer.cancel');

    Route::get('/officer-admin/edit/{id}', 'edit')->name('officer.edit');
    Route::put('/officer-admin/update/{id}', 'update')->name('officer.update');

});

Route::controller(ClearanceController::class)->group(function(){

    Route::get('/clearance-admin', 'index')->name('clearance.index');

    Route::get('/clearance-admin/create/{id}', 'create')->name('clearance.create');
    Route::post('/clearance-admin/store', 'store')->name('clearance.store');

    Route::get('/clearance-admin/show/{id}', 'show')->name('clearance.show');

    Route::post('/clearance-admin/approve/{id}', 'approve')->name('clearance.approve');
    Route::delete('/clearance-admin/cancel/{id}', 'cancel')->name('clearance.cancel');

});



