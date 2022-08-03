<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::put('/dashboard/update/{id}', [UserController::class, 'update']);

Route::get('posts', [PostController::class,'index'])->name('posts.index');
Route::get('posts/{post:slug}', [PostController::class,'show'])->name('post.index');
Route::post('posts/create', [PostController::class, 'store']);
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/{username}', [UserController::class, 'show'])->name('user.index');

require __DIR__.'/auth.php';
