<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminNewsLaterController;
use App\Http\Controllers\Admin\Category\BrandController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\CouponController;
use App\Http\Controllers\Admin\Category\SubCategoryController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Frontend\NewsLaterController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('frontend.index');
});

Route::get('login', function () {
    return view('auth.login');
});

//Frontend Controller

Route::post('newslater/store', [NewsLaterController::class, 'store'])->name('newslater.store');

// Auth::routes();

Auth::routes(['verify' => true]);

// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('change.password');
Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('password.updated');


Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('subcategories', SubCategoryController::class);
    Route::resource('coupons', CouponController::class);
    Route::resource('newslaters', AdminNewsLaterController::class)->only(['index', 'destroy']);
    // Route::delete('newslaters/destroyAll', [AdminNewsLaterController::class, 'destroyAll'])->name('newslaters.destroyAll');
    Route::resource('products', ProductController::class);
    Route::get('get-subcategories/{category_id}', [ProductController::class, 'getSubcategories'])
        ->name('admin.get-subcategories');

    Route::post('inactive/products/{product}', [ProductController::class, 'toggleStatus'])
        ->name('products.toggle-status');

    Route::resource('blogs-categories', PostCategoryController::class);
    Route::resource('blogs-posts', PostController::class);
});

Route::prefix('user')->middleware(['auth', 'user'])->name('user.')->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
});


