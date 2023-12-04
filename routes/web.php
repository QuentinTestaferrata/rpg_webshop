<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\DeleteItemController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\UpdateItemController;

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

Auth::routes();

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/create_item', [CreateController::class, 'show'])->name('create_item');
    Route::post('/store_item', [CreateController::class, 'store'])->name('store_item');
    Route::delete('/delete_item/{id}', [DeleteItemController::class, 'deleteItem'])->name('delete_item');
    Route::get('/edit/{id}', [EditController::class, 'show'])->name('edit_item');
    Route::patch('/update/{id}', [UpdateItemController::class, 'update'])->name('update_item');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')
//->name('home')
//->middleware(AdminMiddleware::class)
;

//faq
Route::get('/faq', [App\Http\Controllers\FAQController::class, 'faqView'])->name('faq');


//profile page
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');