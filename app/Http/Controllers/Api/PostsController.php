<?php

namespace App\Http\Controllers\Api;

use App\Data\PostData;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);

        return PostData::collection($posts);
    }
}
