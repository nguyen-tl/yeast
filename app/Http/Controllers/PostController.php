<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function getAllPosts()
    {
    	$posts = Post::paginate();

    	return view('posts', ['posts' => $posts]);
    }

    public function getDetailPost($id)
    {
        $post = Post::findOrFail($id);
        
        return view('post_detail', ['post' => $post]);
    }
}
