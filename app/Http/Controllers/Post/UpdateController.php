<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post) {
        $data = $request->validated();

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }
}
