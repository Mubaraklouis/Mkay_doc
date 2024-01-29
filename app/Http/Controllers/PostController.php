<?php

namespace App\Http\Controllers;
use App\Http\Resources\postResource;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Repositories\PostRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * return  @JsonResponse with all the posts
     */
    public function index(Request $request)
    {

        $pageSize = 10;

        $post = Post::query()->paginate($pageSize);

        return  postResource::Collection($post);

    }

    /**
     * Store a newly created resource in storage.
     * @param StorePostRequest $request
     */
    public function store(StorePostRequest $request, PostRepository $post)
    {
        $post->store($request->validated());
     
    }


    /**
     * Display the specified post by the id.
     *  @return postResource
     */
    public function show(Post $post)
    {
        return new postResource($post);
    }

    /**
     * Update the specified resource in storage.
     * @return postResource
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->query()->update($request->validated());
        return new postResource($post);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return new postResource($post);
    }
}
