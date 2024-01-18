<?php

use App\Http\Controllers\usersController;
use Illuminate\Support\Facades\Route;

/*
* [] Api resource for users only here
*
*/
Route::apiResource('users',usersController::class);
