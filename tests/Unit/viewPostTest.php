<?php

namespace Tests\Unit;

use App\Http\Controllers\PostController;
use PHPUnit\Framework\TestCase;

class viewPostTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_view_post(): void
    {
        //define the goal of the test
        $response  = $this->any('http://localhost:8000/api/v1/posts');
        $this->assertStatus(201);
    }
}
