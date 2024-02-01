<?php

namespace App\Repositories;

use App\Events\postCreatedEvent;
use App\Exceptions\postExcerption;
use App\Http\Resources\postResource;
use App\Models\Post;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;


class PostRepository
{
    /*
    * store() creates new post in the database
    * @return postRepository
    */

    public function  store(array $attributes)
    {
        $created = DB::transaction(function () use ($attributes) {

            $created = Post::query()->create(
                [

                    'title' => data_get($attributes, 'title'),
                    'body' => data_get($attributes, 'body')
                ]
            );
            //syncing the post with the user who created it
            $created->users()->sync(data_get($attributes, 'user_ids'));
            if (!$created) {
                throw new postExcerption("post not created", 500);
            }
        });


        //fire an event to the user with the email user created
        event(new postCreatedEvent($created));
        return new postResource($created);
    }


      /*
    * store() updates new post in the database
    * @return postRepository
    */

    public function update(array $attributes ,Post $post)
    {
      DB::transaction(function () use ($attributes,$post) {
           $post->query()->update(
                [
                    'title' => data_get($attributes,'title'),
                    'body' => data_get($attributes,'body')
                ]
            );

            //sync the updated post with all the user ids
            $post->users()->sync(data_get($attributes,'user_ids'));

            if(!$post)
            {
                throw new postExcerption("error in updated",500);

            }

        });
        return new JsonResource($post);
    }


}
