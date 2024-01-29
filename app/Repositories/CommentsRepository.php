<?php
namespace App\Repositories;

use App\Http\Resources\commentResource;
use App\Models\Comment;

class CommentsRepository
{
    public function create( array $attributes)
    {
$created=[

            'body' => data_get($attributes,'body'),
            'user_id'=>data_get($attributes,'user_id'),
            'post_id'=>data_get($attributes,'post_id')
];
        Comment::query()->create($created);

        return new commentResource($created);

    }




}
