<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Post\BaseController;

class IndexController extends BaseController
{
    public function __invoke() {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }
}
