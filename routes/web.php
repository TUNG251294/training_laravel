<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

    Route::get('/', [CustomAuthController::class, 'index']);
    Route::get('login', [CustomAuthController::class, 'index'])->name('login');
    Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
    Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
    Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
    Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::prefix('users')->group(function () {
    Route::get('', [UserController::class, 'index']);
    Route::get('create', [UserController::class, 'create']);
    Route::post('create', [UserController::class, 'store']);
    Route::get('update/{id}', [UserController::class, 'edit']);
    Route::post('update/{id}', [UserController::class, 'update']);
    Route::get('delete/{id}', [UserController::class, 'delete']);
    Route::post('delete/{id}', [UserController::class, 'destroy']);
});
