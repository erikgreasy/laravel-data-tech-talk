<?php

namespace App\Http\Controllers;

use App\Actions\CreatePostAction;
use App\Data\PostData;
use App\Models\Post;
use Carbon\Carbon;
use Inertia\Inertia;

class PostsController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'posts' => PostData::collection(\App\Models\Post::query()->latest()->get())
        ]);
    }

    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    public function store(PostData $postData, CreatePostAction $createPostAction)
    {
        $createPostAction->execute($postData);

        return redirect()->route('home');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('home');
    }
}
