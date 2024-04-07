<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function __invoke() {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);
        // dd($tags, $data);
        $post = Post::create($data);

        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }
}
