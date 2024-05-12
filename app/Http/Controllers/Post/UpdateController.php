<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Http\Controllers\Post\BaseController;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post) {

        $data = $request->validated();

        $post = $this->service->update($post, $data);

        return new PostResource($post); 

        // return redirect()->route('post.show', $post->id);
    }
}
