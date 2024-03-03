<?php

use App\Listeners\sendWelcomeEmail;
use App\Mail\welcomeEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

use function Termwind\render;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-mail',function()
{
    $user = User::factory()->make();
    $email = new welcomeEmail();
    Mail::to($user)->send($email);
    return null;
});
