<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

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

    public function user(User $user)
    {
        return view('user', ['user' => $user, 'posts' => $user->posts()->published()->latest('published_at')->get()]);
    }
}
