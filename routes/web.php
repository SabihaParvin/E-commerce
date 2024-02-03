<?php

use App\Console\Commands\Permission;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\CustomerController as FrontendCustomerController;
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

//wesite routes

Route::get('/', [FrontendHomeController::class, 'home'])->name('frontend.home');

Route::get('/registration', [FrontendCustomerController::class, 'registration'])->name('customer.registration');
Route::post('/reg-form-post', [FrontendCustomerController::class, 'store'])->name('registration.store');

Route::get('/login', [FrontendCustomerController::class, 'login'])->name('customer.login');
Route::post('/login-post', [FrontendCustomerController::class, 'loginPost'])->name('customer.loginPost');
Route::get('/logout', [FrontendCustomerController::class, 'logout'])->name('customer.logout');
Route::get('/profile', [FrontendCustomerController::class, 'profile'])->name('customer.profile');


//admin panel routes

Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', [UserController::class, 'loginForm'])->name('admin.login');
    Route::post('/login-form-post', [UserController::class, 'loginPost'])->name('admin.login.post');

    Route::group(['middleware' => 'auth'], function () {
        Route::group(['middleware' => 'CheckAdmin'], function () {

            Route::get('/home', [HomeController::class, 'home'])->name('dashboard');

            Route::get('/logout', [UserController::class, 'logOut'])->name('admin.logout');

            Route::get('/users/list', [UserController::class, 'list'])->name('users.list');
            Route::get('/create/user', [UserController::class, 'create'])->name('create.user');
            Route::post('/store/user', [UserController::class, 'store'])->name('store.user');

            Route::get('/category/list', [CategoryController::class, 'list'])->name('category.list');
            Route::get('/create/category', [CategoryController::class, 'create'])->name('create.category');
            Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

            Route::get('/brand/list', [BrandController::class, 'list'])->name('brand.list');
            Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
            Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');

            Route::get('/product/list', [ProductController::class, 'list'])->name('product.list');
            Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
            Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

            Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
                Route::get('/list', [RoleController::class, 'list'])->name('list');
                Route::get('/create', [RoleController::class, 'create'])->name('create');
                Route::post('/store', [RoleController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [RoleController::class, 'update'])->name('update');
                Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('delete');
            });

            Route::get('/permission-assign/{role_id}', [PermissionController::class, 'permission'])->name('role.assign');
            Route::post('/permission-assign/{role_id}', [PermissionController::class, 'assignPermission'])->name('assign.permission');
            });
    });
});



