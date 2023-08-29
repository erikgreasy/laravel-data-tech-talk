<?php

use App\Http\Controllers\PostsController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [PostsController::class, 'index'])->name('home');
Route::get('posts/create', [PostsController::class, 'create']);
Route::post('posts', [PostsController::class, 'store']);
Route::delete('posts/{post:slug}', [PostsController::class, 'destroy']);
