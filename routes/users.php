<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::middleware(['auth', 'role:user'])->group(function() {
    Route::get('/user',[UserController::class, 'index'])->name('user');
    Route::post('/users/profile/store',[UserController::class, 'UserStore'])->name('users.profile.store');
    Route::get('/users/logout',[UserController::class, 'UserLogout'])->name('users.logout');
    Route::get('/users/change/password',[UserController::class, 'UserChangepassword'])->name('users.change.password');
    Route::post('/users/update/password', [UserController::class, 'UserUpdatePassword'])->name('users.update.password');

});//End User middleware

