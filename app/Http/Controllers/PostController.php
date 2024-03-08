<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::where('likes', '>', 15)->get();
        foreach ($posts as $post) {
            dump($post->likes);
        }
        dd($posts);
    }

    public function create() {
        $postsArr = [
            [
                'title' => 'A post from VSCode',
                'content' => 'VSCode content',
                'image' => 'VSCode image',
                'likes' => 30,
                'is_published' => 1,
            ],
            [
                'title' => 'A 2 post from VSCode',
                'content' => 'VSCode 2 content',
                'image' => 'VSCode 2 image',
                'likes' => 50,
                'is_published' => 1,
            ],
        ];

        foreach ($postsArr as $post) {
            Post::create($post);
        }

        dd('created');
    }

    public function update() {
        $post = Post::find(6);

        $post->update([
            'title' => '111 updated',
            'content' => 'updated',
            'image' => 'updated',
        ]);
        dd('updated');
    }

    public function delete() {
        $post = Post::find(4);
        $post->delete();
        // Восстановление после софт делит
        // $post = Post::withTrashed()->find(2);
        // $post->restore();
        dd('deleted');
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
