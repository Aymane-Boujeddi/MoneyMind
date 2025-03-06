<?php

use App\Http\Controllers\AlertController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
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
    Route::get('/income',[UserController::class ,'showIncomePage'])->name('income');
    Route::get('/alerts' , [AlertController::class , 'showAlertsPage'])->name('alerts');
    Route::post('/alerts/global' ,[AlertController::class , 'addGlobalAlert'])->name('addGlobalAlert');
    Route::post('/alerts/category' ,[AlertController::class , 'addCategoryAlert'])->name('addCategoryAlert');
    Route::get('/expenses',[DepenseController::class , 'showExpense'])->name('expenses');
    Route::post('/expenses/ponctuel' ,[DepenseController::class , 'addPunctalExpense'])->name('ponctuel');
    Route::post('/expenses/recurente' ,[DepenseController::class , 'addRecurentExpense'])->name('recurente');
    Route::delete('/expenses/recurente/{id}' ,[DepenseController::class , 'deleteRecurenteExpense']);
    Route::delete('/expenses/ponctuel/{id}' ,[DepenseController::class , 'deletePonctuelExpense']);
    Route::get('/savings' , [SavingController::class , 'showSavingsPage'])->name('savings');
    Route::post('/savings' , [SavingController::class , 'addSaving'])->name('addSaving');
    Route::delete('/savings/{id}' , [SavingController::class , 'deleteSaving']);
    Route::get('/wishlist' , [WishlistController::class , 'showWishlistPage'])->name('wishlist');
    Route::post('/wishlist' , [WishlistController::class , 'store'])->name('addWishlist');
    Route::delete('/wishlist/{id}' , [WishlistController::class , 'destroy'])->name('deleteWishlist');
    Route::get('/recurring' ,function(){
        return view('user.recurring');
    })->name('recurring');
    Route::get('/profile' ,function(){
        return view('user.profile');
    })->name('profile');
    // Route::get('/recurring' ,function(){
    //     return view('recurring');
    // });
  
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
