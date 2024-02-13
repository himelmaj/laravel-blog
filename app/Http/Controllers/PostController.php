<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function __invoke(Request $request)
    {
        return view('blog' , [
            'posts' => Post::take(3)->get(),
        ]);
    }
}
