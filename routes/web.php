<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\DeleteItemController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\UpdateItemController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;

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
    //Profile
    Route::post('/profile/make-admin/{user}', [ProfileController::class, 'makeAdmin'])->name('profile.make_admin');
    Route::match(['post', 'patch'], '/profile/make-user/{user}', [ProfileController::class, 'makeUser'])->name('profile.make_user');

    Route::delete('/profile/delete/{user}', [ProfileController::class, 'deleteUser'])->name('profile.delete_user');

    //all users
    Route::get('/all_users', [UserController::class, 'showAllUsers'])->name('search.all_users');

    //ITEM ROUTES
    Route::get('/create_item', [CreateController::class, 'show'])->name('create_item');
    Route::post('/store_item', [CreateController::class, 'store'])->name('store_item');
    Route::delete('/delete_item/{id}', [DeleteItemController::class, 'deleteItem'])->name('delete_item');
    Route::get('/edit/{id}', [EditController::class, 'show'])->name('edit_item');
    Route::patch('/update/{id}', [UpdateItemController::class, 'update'])->name('update_item');

    //FAQ
    Route::get('/faq_edit', [FAQController::class, 'editFaqView'])->name('faq.edit_faq');
    Route::delete('/delete_category/{id}', [FAQController::class, 'deleteFAQCategory'])->name('delete_category');
    Route::post('/add_category', [FAQController::class, 'addCategory'])->name('add_category');
    Route::put('/faq/edit_item/{id}', [FAQController::class, 'updateFaqItem'])->name('update_faq_item');
    Route::delete('/faq/delete/{id}', [FAQController::class, 'deleteFaqItem'])->name('delete_faq_item');
    Route::post('/faq/add-item/{category_id}', [FAQController::class, 'addFaqItem'])->name('add_faq_item');
});
Route::put('/faq/edit_category/{id}', [FAQController::class, 'updateFaqCategory'])->name('update_faq_category');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')
//->name('home')
//->middleware(AdminMiddleware::class)
;

//faq
Route::get('/faq', [App\Http\Controllers\FAQController::class, 'faqView'])->name('faq.faq');

//search users
Route::get('/search-users', [UserController::class, 'searchUsers'])->name('search.users');

//contact
Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitContactForm'])->name('contact.submit');
Route::get('/inquiry/{id}', [ContactController::class, 'showInquiry'])->name('contact.show');
Route::get('/admin/inquiries', [ContactController::class, 'showAdminInquiries'])->name('admin.inquiries');
Route::post('/admin/inquiries/respond/{id}', [ContactController::class, 'respondToInquiry'])->name('admin.inquiries.respond');
Route::get('/user_inquiries', [ContactController::class, 'showUserInquiries'])->name('contact.user_inquiries');
Route::delete('/inquiry/delete/{id}', [ContactController::class, 'deleteInquiry'])->name('inquiry.delete');



//profile page
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile/edit/{user}', [ProfileController::class, 'show_edit_profile'])->name('profile.edit_profile');
