<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\SocialController;

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

Route::get('/', function () { return redirect('home');});
Route::get('/home', HomeController::class)->name('home');

Route::prefix('/blog')->group(function () {
    Route::get('/', PostController::class)->name('blog');
    Route::get('/{post:slug}', [PostController::class, 'show'])->name('show');
    Route::get('/user/{user:username}/posts', [PostController::class, 'userPost'])->name('user');
});

Route::get('/auth/{provider}/redirect', [SocialController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [SocialController::class, 'callback']);


Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->group(function () {
    
});
