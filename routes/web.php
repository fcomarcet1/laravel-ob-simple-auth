<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route:: redirect('/', '/home');

//Route::get('/home', [HomeController::class, 'index'])->name('home');

## Routes without auth
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

## Routes with auth
Route::middleware('authentication')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::get('/{id}', [UserController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::match(['POST', 'PUT', 'PATCH'], '/{id?}', [UserController::class, 'store'])->name('store');
        Route::delete('/{id}', [UserController::class, 'delete'])->name('delete');
    });

    Route::prefix('roles')->name('roles.')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::get('/create', [RoleController::class, 'create'])->name('create');
        Route::get('/{id}', [RoleController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
        Route::match(['POST', 'PUT', 'PATCH'], '/{id?}', [RoleController::class, 'store'])->name('store');
        Route::delete('/{id}', [RoleController::class, 'delete'])->name('delete');
    });

    Route::prefix('types')->name('types.')->group(function () {
        Route::get('/', [TypeController::class, 'index'])->name('index');
        Route::get('/create', [TypeController::class, 'create'])->name('create');
        Route::get('/{id}', [TypeController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [TypeController::class, 'edit'])->name('edit');
        Route::match(['POST', 'PUT', 'PATCH'], '/{id?}', [TypeController::class, 'store'])->name('store');
        Route::delete('/{id}', [TypeController::class, 'delete'])->name('delete');
    });
});

