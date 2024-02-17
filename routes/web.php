<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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
Route::get('/dashboard', function () { return redirect('home');});

Route::get('/home', HomeController::class)->name('home');
Route::get('/blog', PostController::class)->name('blog');



Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    
});
