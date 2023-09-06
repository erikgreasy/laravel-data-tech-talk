<?php

namespace Tests\Feature\Api;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_lists_posts(): void
    {
        Post::factory(10)->create();

        $this
            ->getJson('/api/posts')
            ->assertSuccessful()
            ->assertJsonCount(10, 'data');
    }
}
