<?php

namespace App\Repositories;

use App\Events\postCreatedEvent;
use App\Events\postDeletedEvent;
use App\Exceptions\postExcerption;
use App\Models\Post;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class PostRepository
{
    /*
    * store() creates new post in the database
    * @return postRepository
    */

    public function  store(array $attributes , Post $post)

    {

           DB::transaction(
            function () use ($attributes,$post) {
                $post=Post::query()->create([
                    "title" => data_get($attributes, 'title'),
                    "body" => data_get($attributes, 'body')
                ]);
                //this line of code explain how to add to the pivot coloumn in the database
                $post->users()->attach(data_get($attributes, 'user_ids'));
            }
        );

        //check if the post is created an order to throw an exception

        event(new postCreatedEvent($post));



    }

    /*
    * update() updates new post in the database
    * @return postRepository
    */

    public function update(array $attributes, Post $post)
    {
        $created = $post->transaction(function () use ($attributes, $post) {
            $post->query()->update(
                [
                    'title' => data_get($attributes, 'title'),
                    'body' => data_get($attributes, 'body')
                ]
            );

            //sync the updated post with all the user ids
            $post->users()->sync(data_get($attributes, 'user_ids'));

            if (!$post) {
                throw new postExcerption("error in updated", 500);
            }
        });
        return new JsonResource($created);
    }

    /*
    * forceDelete() - delete the a resource
    * @return - null
    */

    public function forceDelete(Post $post)
    {

        $post->delete();
        //check if post not deleted send an excerption that post not delete
        if (!$post) {
            throw new postExcerption("post not deleted ", 500);
        }


        //else send a post deleted event
        event(new postDeletedEvent($post));
    }
}
