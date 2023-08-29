<?php

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

Route::get('/', function () {
    $postDTOs = \App\Models\Post::all()->map(fn (Post $post) => new \App\DataTransferObjects\PostDTO(
        title: $post->title,
        slug: $post->slug,
        body: $post->body,
        publishedAt: $post->published_at
    ));

    return Inertia::render('Home', [
        'posts' => $postDTOs
    ]);
});
