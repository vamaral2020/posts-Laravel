<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;



use App\User;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    //Route::resource('roles', RoleController::class);

    Route::get('/users/index', [UserController::class, 'index'])->name('users.index');
    Route::post('/users',[UserController::class, 'create'])->name('users.create');
    Route::put('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users/show/{id}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');


    Route::get('/roles/index', [RoleController::class, 'index'])->name('roles.index');
    Route::post('/roles',[RoleController::class, 'create'])->name('roles.create');
    Route::put('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::get('/roles/show/{id}', [RoleController::class, 'show'])->name('roles.show');
    Route::delete('/users/destroy/{id}', [RoleController::class, 'destroy'])->name('users.destroy');


    Route::get('/posts/index', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts',[PostController::class, 'create'])->name('posts.create');
    Route::put('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::get('/posts/show/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::delete('/users/destroy/{id}', [PostController::class, 'destroy'])->name('users.destroy');

    // Route::resource('users', UserController::class);
    // Route::resource('posts', PostController::class);

});
