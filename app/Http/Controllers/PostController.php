<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Post;

class PostController extends Controller
{
    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->first();

        if (!$post)
            abort(500);

        return view('post', ['post' => $post]);
    }

    public function index()
    {
        $posts = Post::where('status', 'PUBLISHED')->orderBy('id', 'desc')->paginate(5);

        return view('posts', ['posts' => $posts]);
    }
}
