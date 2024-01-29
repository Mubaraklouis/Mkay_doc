<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::query()->get();

        return new JsonResource(
            [
                "data" => $comments
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $comment = $request->validated();
        Comment::query()->create($comment);

        return new JsonResource(

            [
                "data" => $comment
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return new JsonResource(
            [
                "data" => $comment
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {

        $comment->query()->update($request->validated());
        return new JsonResource(

            [
                "data" => $request->validated()
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return new JsonResource(
            [
                "data" => $comment
            ]
        );
    }
}
