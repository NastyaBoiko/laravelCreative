<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __invoke(Post $post) {
        $data = request()->validate([
            'title' => '',
            'content' => '',
            'image' => '',
            'category_id' => '',
            'tags' => '',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }
}
