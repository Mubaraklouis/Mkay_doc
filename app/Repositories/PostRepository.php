<?php
namespace App\Repositories;
use App\Http\Resources\postResource;
use App\Models\Post;
use Illuminate\Support\Facades\DB;


class PostRepository
{
    public function  store( array $attributes)
    {
        $created= DB::transaction(function () use ($attributes) {

            $created = Post::query()->create(
                [

                    'title' => data_get($attributes,'title'),
                    'body' => data_get($attributes,'body')
                ]
            );

            $created->users()->sync(data_get($attributes,'user_ids'));
        });
        return new postResource($created);
    }
}
