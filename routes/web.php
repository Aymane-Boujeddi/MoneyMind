<?php

use App\Http\Controllers\DepenseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
})->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/user', function () {
        return view('user-dashboard');
    })->name('user');
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/income' ,function(){
        return view('user.income');
    })->name('income');
    Route::get('/alerts' ,function(){
        return view('user.alerts');
    })->name('alerts');
    Route::get('/expenses' ,[DepenseController::class , 'showExpense'])->name('expenses');
    Route::post('/expenses/ponctuel' ,[DepenseController::class , 'addPunctalExpense'])->name('ponctuel');
    Route::post('/expenses/recurente' ,[DepenseController::class , 'addRecurentExpense'])->name('recurente');
    Route::get('/goals' ,function(){
        return view('user.goals');
    })->name('goals');
    Route::get('/recurring' ,function(){
        return view('user.recurring');
    })->name('recurring');
    Route::get('/profile' ,function(){
        return view('user.profile');
    })->name('profile');
    // Route::get('/recurring' ,function(){
    //     return view('recurring');
    // });
    Route::get('/wishlist' ,function(){
        return view('user.wishlist');
    })->name('wishlist');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
