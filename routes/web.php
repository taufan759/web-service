<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Admin\MotivationController;
use App\Http\Controllers\ProfileController;

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
    return redirect()->route('admin.login'); 
});

Route::get('/admin/login', [LoginAdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginAdminController::class, 'login']);

Route::get('/admin/signup', [LoginAdminController::class, 'showSignUpForm'])->name('admin.signup');
Route::post('/admin/signup', [LoginAdminController::class, 'signUp']);

Route::get('/profile/settings', function () {
    return view('profile.settings'); // Kembalikan tampilan settings
})->name('profile.settings');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [MotivationController::class, 'index'])->name('admin.dashboard');
    Route::post('/dashboard/store', [MotivationController::class, 'store'])->name('dashboard.store');
    Route::delete('/dashboard/{id}', [MotivationController::class, 'destroy'])->name('dashboard.destroy');
    Route::put('/dashboard/{id}', [MotivationController::class, 'update'])->name('dashboard.update');
    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::post('/profile/settings', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::get('/dashboard/{id}/edit', [MotivationController::class, 'edit'])->name('dashboard.edit');

});

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('admin.login');
})->name('logout');