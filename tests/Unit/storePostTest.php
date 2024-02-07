<?php

namespace Tests\Unit;

use App\Repositories\PostRepository;
use PHPUnit\Framework\TestCase;

class storePostTest extends TestCase
{
    /**
     * Test where store a post work exactly as specked.
     */
    public function store_post_test(): void
    {
        //get all the data to send to the database
        $payload = [
            "title" => fake()->name(),
            "body" => fake()->text()
        ];
        //insert the data in the database
        $postRepository = new PostRepository();
        $results = $postRepository->store($payload);
        //compare the results
        $this->assertTrue($results,"post inserted successfully");
    }
}
