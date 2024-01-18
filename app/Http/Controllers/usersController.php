<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class usersController extends Controller
{
    /**
     * Display a listing of all the users in the database
     */
    public function index(User $user)
    {
        return
            [
                "users" => $user::all()
            ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


        return
            [
                "user" => User::find($id)

            ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
