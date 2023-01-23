<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware('auth')->group(
    function () {

        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/admin/category', [AdminController::class, 'category'])->name('admin.category');
        Route::get('/admin/house', [AdminController::class, 'house'])->name('admin.house');
        Route::get('/admin/message', [AdminController::class, 'message'])->name('admin.message');
    }
);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';