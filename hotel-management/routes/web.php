<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AdminController;

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
    return view('welcome');
});
Route::any('/verification', [VerificationController::class, 'index'])->name('verification.index');
Route::any('/signup',  [VerificationController::class, 'signup'])->name('signup');

// Define the "view" route in your routes file
Route::get('/view', [ViewController::class, 'view'])->name('view');
Route::any('/user/index', [ViewController::class, 'index'])->name('user/index');
Route::any('/user/room', [ViewController::class, 'room'])->name('user/room');
Route::any('/user/modal', [ViewController::class, 'modal'])->name('user/modal');
Route::get('/user/view/{id}', [ViewController::class, 'show'])->name('user/view');
Route::any('/user/book/{id}', [ViewController::class, 'book'])->name('user/book');

Route::any('admin/index', [AdminController::class, 'index'])->name('admin/index');
Route::any('admin/addroom', [AdminController::class, 'addroom'])->name('admin/addroom');
Route::any('admin/editroom/{id}', [AdminController::class, 'editroom'])->name('admin/editroom');
Route::any('admin/deleteroom/{id}', [AdminController::class, 'deleteroom'])->name('admin/deleteroom');