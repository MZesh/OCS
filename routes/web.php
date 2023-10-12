<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\DonerController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\RegistrationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/ 

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/card/create/{id}', [CardController::class,'selectFromDropdown']);
      
    Route::resource('membership',MembershipController::class);
    Route::resource('doners',DonerController::class);
    Route::resource('expense',ExpenseController::class);
    Route::resource('card',CardController::class);
    Route::resource('payment',PaymentController::class);
    Route::resource('emergency',EmergencyController::class);
    Route::resource('fee',RegistrationController::class);

    //users
    Route::resource('user',UserDataController::class);
});



Route::get('/search',[SearchController::class,'search'])->name('payment.search');
require __DIR__.'/auth.php';
