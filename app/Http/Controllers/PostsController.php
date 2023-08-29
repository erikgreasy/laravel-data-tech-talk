<?php

namespace App\Http\Controllers;

use App\Actions\CreatePostAction;
use App\DataTransferObjects\PostDTO;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    public function store(PostRequest $request, CreatePostAction $createPostAction)
    {
        $validated = $request->validated();

        $postDto = new PostDTO(
            $validated['title'],
            $validated['slug'],
            $validated['body'],
            $validated['published_at']
        );

        $createPostAction->execute($postDto);

        return redirect()->back();
    }
}
