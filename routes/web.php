<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\House;
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
    $categories = Category::inRandomOrder()->get();
    $houses = House::with('category')->inRandomOrder()->take(10)->get();
    return view('welcome', compact('categories', 'houses'));
})->name('home');

Route::get('/admin/contact', [AdminController::class, 'contact'])->name('admin.contact');
Route::post('/admin/contact', [AdminController::class, 'contactStore'])->name('admin.contactStore');

Route::middleware('auth')->group(
    function () {

        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/admin/category', [AdminController::class, 'category'])->name('admin.category');
        Route::get('/admin/house', [AdminController::class, 'house'])->name('admin.house');
        Route::get('/admin/message', [AdminController::class, 'message'])->name('admin.message');
        Route::post('/admin/editUser/{user}', [AdminController::class, 'editUser'])->name('admin.editUser');
        Route::post('/admin/deleteUser/{user}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');

        // category routes
        Route::resource('category', CategoryController::class)->except('index')->except('show');

        Route::resource('/house', HouseController::class)->except('show', 'update');
        Route::POST('/house/update/{house}', [HouseController::class, 'update'])->name('house.update');
        Route::POST('house/retire/{house}', [HouseController::class, 'retireHouseOfLocation'])->name('house.retireHouseOfLocation');
    }
);

Route::get('/house/{house}', [HouseController::class, 'show'])->name('house.show');
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');

//Chat route's

Route::get('/chat{house}', [ChatController::class, 'chatWithProprietaire'])->name('chat.chatWithProprietaire');



// Laravel Breeze route 's.
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
