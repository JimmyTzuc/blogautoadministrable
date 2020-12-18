<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('status',2)->latest('id')->paginate(8);

        return view('posts.index', compact('posts'));
    }
}
