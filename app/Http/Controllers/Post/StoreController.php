<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request) {
        
        $data = $request->validated();

        $tags = $data['tags'];
        unset($data['tags']);
        // dd($tags, $data);
        $post = Post::create($data);

        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }
}
