<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
})->name('WebRoot');

Route::get('/signup', function () {
    return view('auth.signn');
})->name('register');

Route::group(['middleware' => 'auth'], function () {
    //Rout for dashboard
    Route::get('/dashboard', [HomeController::class, 'index'])->name('web.dashboard');

    //route for profile
    Route::get('/profile/{id}', [ProfileController::class, 'view'])->name('user.profile');

    //route for users
    Route::group(["prefix" => "users"], function () {
        Route::get('/', [UserController::class, 'index'])->name("web.userIndex");

        //route for edit
        Route::get('/edit/{id}', [Usercontroller::class, 'edit'])->name('profile.edit');

        //route for update  
        Route::post('/update', [UserController::class, 'update'])->name('profile.update');

        //route for delete
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('profile.delete');

        //route for show
        Route::get('/view/{id}', [UserController::class, 'show'])->name('profile.view');
    });
});
require __DIR__ . '/auth.php';
