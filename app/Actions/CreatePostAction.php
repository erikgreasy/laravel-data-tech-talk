<?php

namespace App\Actions;

use App\DataTransferObjects\PostDTO;
use App\Models\Post;

class CreatePostAction
{
    public function execute(PostDTO $postDTO): Post
    {
        $post = Post::create([
            'title' => $postDTO->title,
            'slug' => $postDTO->slug,
            'body' => $postDTO->body,
            'published_at' => $postDTO->publishedAt,
        ]);

        // do some action with newly created post

        return $post;
    }
}
