<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('post.index', compact('posts'));
        // либо так
        // return view('posts', ['posts' => $posts]);
    }

    public function create() {
        return view('post.create');
    }

    public function store() {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string'
        ]);
        
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post) {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post) {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post) {
        $data = request()->validate([
            'title' => '',
            'content' => '',
            'image' => ''
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }

    public function delete() {
        $post = Post::find(4);
        $post->delete();
        // Восстановление после софт делит
        // $post = Post::withTrashed()->find(2);
        // $post->restore();
        dd('deleted');
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function firstOrCreate() {
        $anotherPost = [
            'title' => 'Some post from VSCode',
            'content' => 'Some VSCode content',
            'image' => 'Some VSCode image',
            'likes' => 500,
            'is_published' => 1,
        ];

        $post = Post::firstOrCreate(
            [
                'title' => 'A post from VSCode'
            ], 
            [
                'title' => 'A post from VSCode',
                'content' => 'Some VSCode content',
                'image' => 'Some VSCode image',
                'likes' => 500,
                'is_published' => 1
            ]);
        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate() {
        $anotherPost = [
            'title' => 'Some post from VSCode',
            'content' => 'Some VSCode content',
            'image' => 'Some VSCode image',
            'likes' => 500,
            'is_published' => 1,
        ];

        $post = Post::updateOrCreate(
            [
                'title' => 'As new post'
            ], 
            [
                // 'title' => 'A new post',
                'content' => 'New content',
                'image' => 'New image',
                'likes' => 0,
                'is_published' => 1
            ]);
        dump($post->content);
        dd('finished');
    }
}
