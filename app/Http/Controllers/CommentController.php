<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\commentResource;
use App\Repositories\CommentsRepository;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     * return commentResource collection
     */
    public function index()
    {
        $comments = Comment::query()->get();

      return  commentResource::collection($comments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request,CommentsRepository $commentsRepository)
    {
      $commentsRepository->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return new commentResource($comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {

        $comment->query()->update($request->validated());
        return new commentResource($comment);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {

 
        return new commentResource($comment);

    }
}
