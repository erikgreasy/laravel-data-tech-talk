<?php

namespace App\Actions;

use App\Data\PostData;
use App\Models\Post;

class CreatePostAction
{
    public function execute(PostData $postData): Post
    {
        $post = Post::create($postData->toArray());

        // do some action with newly created post

        return $post;
    }
}
