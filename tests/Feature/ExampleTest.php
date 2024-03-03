<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Post;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        //load dummy data from the data base
        $posts = Post::factory()->make();
        $response = $this->get('api/v1/posts');

        $response->assertStatus(200);
    }
}
