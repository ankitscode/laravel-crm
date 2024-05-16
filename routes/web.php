<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
})->name('WebRoot');

Route::get('/signup', function () {
    return view('auth.signn');
})->name('register');

Route::group(['middleware' => 'auth'], function (){
    Route::get('/dashboard', [ProfileController::class, 'index'])->name('web.dashboard');
    //route for users
    Route::group(["prefix"=>"users"], function(){
        Route::get('/',[UserController::class, 'index'])->name("web.userIndex");
        //route for edit
        Route::get('/edit/{id}', [Profilecontroller::class, 'edit'])->name('profile.edit');
    
        //route for update  
        Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
    
        //route for delete
        Route::get('/delete/{id}', [ProfileController::class, 'delete'])->name('profile.delete');
        
        //route for show
        Route::get('/view/{id}', [ProfileController::class, 'show'])->name('profile.view');
        
        //route for profile
        Route::get('/profile/{id}', [ProfileController::class, 'view'])->name('user.profile');

    });
});
require __DIR__ . '/auth.php';
