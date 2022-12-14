<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EloquentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\QueryBuilderController;
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

Route::view('/', 'welcome')->name('welcome');

Route::get('/service-injection', [HomeController::class, 'index'])->name('home');

Route::get('/custom-blade-directive', [HomeController::class, 'testCustomBladeDirective'])
    ->name('custom-blade-directive');

// test query builder
Route::get('/test-query-builder', [QueryBuilderController::class, 'index'])->name('query-builder');

// test eloquent
Route::get('/test-eloquent', [EloquentController::class, 'index'])->name('eloquent');

Route::get('/test-eloquent-custom-model', [EloquentController::class, 'testCustomModel'])
    ->name('eloquent-custom-model');

// soft delete
Route::get('/test-eloquent-soft-delete', [EloquentController::class, 'testSoftDelete'])
    ->name('eloquent-soft-delete');

//with clause
Route::get('/test-eloquent-withClause', [EloquentController::class, 'withClause'])
    ->name('eloquent-withClause');

//Route:: redirect('/', '/home');
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

    Route::prefix('post')->name('post.')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/feed/{format}', [PostController::class, 'feed'])->name('feed');
        Route::get('/test-serialize/{format}', [PostController::class, 'testSerialize'])->name('test-serialize');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::get('/{id}', [PostController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');
        Route::match(['POST', 'PUT', 'PATCH'], '/{id?}', [PostController::class, 'store'])->name('store');
        Route::delete('/{id}', [PostController::class, 'delete'])->name('delete');
    });
});

