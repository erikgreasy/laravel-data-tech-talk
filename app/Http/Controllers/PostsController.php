<?php

namespace App\Http\Controllers;

use App\Actions\CreatePostAction;
use App\DataTransferObjects\PostDTO;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Carbon\Carbon;
use Inertia\Inertia;

class PostsController extends Controller
{
    public function index()
    {
        $postDTOs = \App\Models\Post::query()
            ->latest()
            ->get()
            ->map(fn (Post $post) => new \App\DataTransferObjects\PostDTO(
                title: $post->title,
                slug: $post->slug,
                body: $post->body,
                publishedAt: $post->published_at
            ));

        return Inertia::render('Home', [
            'posts' => $postDTOs
        ]);
    }

    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    public function store(PostRequest $request, CreatePostAction $createPostAction)
    {
        $validated = $request->validated();

        $postDto = new PostDTO(
            $validated['title'],
            $validated['slug'],
            $validated['body'],
            Carbon::parse($validated['published_at'])
        );

        $createPostAction->execute($postDto);

        return redirect()->route('home');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('home');
    }
}
