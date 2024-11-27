<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginAdminController;

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

Route::get('/admin/login', [LoginAdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginAdminController::class, 'login']);

Route::get('/admin/signup', [LoginAdminController::class, 'showSignUpForm'])->name('admin.signup');
Route::post('/admin/signup', [LoginAdminController::class, 'signUp']);

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.index');
})->middleware('auth')->name('admin.dashboard');


Route::get('/', function () {
    return view('welcome');
});
