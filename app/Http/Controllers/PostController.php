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

    public function post()
    {
        return view('post');
    }
}
