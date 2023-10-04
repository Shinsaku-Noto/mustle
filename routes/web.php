<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MenuController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/posts', 'main_index')->name('main_index');
    Route::get('/', 'index')->name('index');
    Route::get('/get_events', 'getEvents')->name('getEvents');
    Route::get('/posts/users', 'users')->name('users');
    Route::get('/posts/create', 'create')->name('create');
    Route::get('/search/menu', 'searchmenu')->name('searchmenu');
    Route::post('/posts/create', 'store')->name('store');
    Route::post('/posts/create/menu', 'store_menu')->name('store_menu');
    Route::delete('/posts/{post}', 'delete')->name('delete');
    Route::delete('/posts/{menu}', 'menu_delete')->name('menu_delete');
});


require __DIR__.'/auth.php';
