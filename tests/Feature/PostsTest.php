<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_render_posts_index_page(): void
    {
        $this
            ->get(route('posts.index'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_render_create_post_page(): void
    {
        $this
            ->get('/posts/create')
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_create_a_post(): void
    {
        $this
            ->from('/posts/create')
            ->post('/posts', [
                'title' => 'This is post title',
                'slug' => 'this-is-post-title',
                'body' => 'Very interesting post this is.',
                'published_at' => '2023-07-06',
            ])
            ->assertRedirect('/');

        $this->assertDatabaseHas(Post::class, [
            'title' => 'This is post title',
            'slug' => 'this-is-post-title',
            'body' => 'Very interesting post this is.',
            'published_at' => '2023-07-06',
        ]);
    }

    /** @test */
    public function it_validates_required_values(): void
    {
        $this
            ->from('/posts/create')
            ->post('/posts')
            ->assertSessionHasErrors(['title', 'slug', 'body', 'published_at'])
            ->assertRedirect('/posts/create');
    }

    /** @test */
    public function it_validates_unique_slug(): void
    {
        Post::factory()->create([
            'slug' => 'this-is-slug',
        ]);

        $this
            ->from('/posts/create')
            ->post('/posts', [
                'title' => 'This is post title',
                'slug' => 'this-is-slug',
                'body' => 'Very interesting post this is.',
                'published_at' => '2023-07-06',
            ])
            ->assertSessionHasErrors(['slug'])
            ->assertRedirect('/posts/create');
    }

    /** @test */
    public function it_validates_published_at_as_date(): void
    {
        $this
            ->from('/posts/create')
            ->post('/posts', [
                'title' => 'This is post title',
                'slug' => 'this-is-slug',
                'body' => 'Very interesting post this is.',
                'published_at' => 'this is not a date',
            ])
            ->assertSessionHasErrors(['published_at'])
            ->assertRedirect('/posts/create');
    }

    /** @test */
    public function it_validates_published_at_is_not_in_future(): void
    {
        $this
            ->from('/posts/create')
            ->post('/posts', [
                'title' => 'This is post title',
                'slug' => 'this-is-slug',
                'body' => 'Very interesting post this is.',
                'published_at' => now()->addDay()->toDateString(),
            ])
            ->assertSessionHasErrors(['published_at'])
            ->assertRedirect('/posts/create');
    }
}
