<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index() {
        $comments = Comment::with(['author', 'post'])->paginate();
        return view('comments.comments', compact('comments'));
    }

    public function show($id) {
        return view('comments.comment', [
            'comment' => Comment::find($id),
        ]);
    }
}
