<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index() {
        $comment = Comment::find(1);
        dd($comment);
        return 'CommentController';
    }
}
