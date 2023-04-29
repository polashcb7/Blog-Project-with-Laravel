<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;


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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',[HomeController::class,'index'])->name('/');
Route::get('/blog-details/{slug}',[HomeController::class,'blogDetails'])->name('blog.details');
Route::get('/blogUser-register',[HomeController::class,'blogUserRegister'])->name('blogUser.register');
Route::post('/new-user',[HomeController::class,'saveUser'])->name('new.user');
Route::get('/customer-logout',[HomeController::class,'customerLogout'])->name('customer.logout');
Route::get('/customer-login',[HomeController::class,'customerLogin'])->name('customer.login');
Route::post('/customer-login-post',[HomeController::class,'customerLoginCheck'])->name('customer.login.post');



Route::group(['middleware' => 'blogUser'],function (){
    Route::post('/new-comment',[HomeController::class,'saveComment'])->name('new.comment');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashborad');
    Route::get('/add-category',[CategoryController::class,'addCategory'])->name('add.category');
    Route::get('/manage-category',[CategoryController::class,'manageCategory'])->name('manage.category');
    Route::post('/new-category',[CategoryController::class,'saveCategory'])->name('new.category');
    Route::get('/edit-category/{category_id}',[CategoryController::class,'editCategory'])->name('edit.category');
    Route::post('/update-category',[CategoryController::class,'categoryUpdate'])->name('update.category');
    Route::get('/show-category/{id}',[CategoryController::class,'showCategory'])->name('show.category');

    Route::get('/add-blog',[BlogController::class,'addBlog'])->name('add.blog');
    Route::post('/new-blog',[BlogController::class,'saveBlog'])->name('new.blog');
    Route::get('/show-blog',[BlogController::class,'showBlog'])->name('show.blog');
    Route::get('/edit-blog/{blog_id}',[BlogController::class,'editBlog'])->name('edit.blog');
    Route::post('/update-blog',[BlogController::class,'blogUpdate'])->name('update.blog');
    Route::post('/blog-delete',[BlogController::class,'blogDelete'])->name('blog.delete');

    Route::get('/add-author',[AuthorController::class,'index'])->name('add.author');
    Route::post('/new-author',[AuthorController::class,'saveAuthor'])->name('new.author');



});
