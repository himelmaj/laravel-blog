<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function __invoke(Request $request)
    {
        return view('blog');
    }

    public function show(Post $post)
    {
        return view('show', ['post' => $post]);
    }
}
