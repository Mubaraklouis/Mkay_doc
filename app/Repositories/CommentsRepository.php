<?php
namespace App\Repositories;

use App\Exceptions\commentExeception;
use App\Http\Resources\commentResource;
use App\Models\Comment;


/*
* Create() => this function overrides the main create function from the laravel Comment model
* $created=> this attributes comfirms that the comment is created
* Comment => this is the main comment model -contains all the crude functionalities
*
*/
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



    public function delete(Comment $comment)
    {
        //send the comment fail exeception if fail to add the comment to the database

        $deleted = $comment->querry()->delete();
        if(!$deleted){
            throw new commentExeception();
        }
        else
        {
            
        }

    }
}
