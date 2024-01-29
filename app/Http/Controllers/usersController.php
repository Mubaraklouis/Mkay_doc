<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class usersController extends Controller
{
    /**
     * Display a listing of all the users in the database
     */
    public function index(User $user)
    {
        $users = $user->query()->get();
      return new JsonResource(
        [
            "data" => $users
        ]
      );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                "name" =>"required",
                "email" =>"required",
                "password" =>"required"
            ]
        );


        User::query()->create($validated);

        return new JsonResource(
            [
                "data" => $validated
            ]
        );


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::query()->find($id);
        return new JsonResource(
            [
                "data"=> $user
            ]
        );

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                "name" =>"required",
                "email" =>"required",
                "password" =>"required"
            ]
            );
            $user = User::query()->find($id);

            $user->update($validated);
            return new JsonResource(

                [
                    "data" => $validated
                ]
            );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)

    {
        $user = User::query()->find($id);
        $user->delete();
        return new JsonResource(
            [
                "data" => $user
            ]
        );

    }
}
