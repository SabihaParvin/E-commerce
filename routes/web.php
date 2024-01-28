<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::get('/',[HomeController::class, 'home'])->name('dashboard');

Route::get('/users/list',[UserController::class, 'list'])->name('users.list');
Route::get('/create/user',[UserController::class, 'create'])->name('create.user');
Route::post('/store/user',[UserController::class, 'store'])->name('store.user');
