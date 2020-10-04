<?php

namespace App\Http\Controllers;
// ==========ここから追加する==========
use App\Comment;
use App\Post;
use Auth;
use Validator;
// ==========ここまで追加する==========

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    // ==========ここから追加する==========
    public function store(Request $request)
    {
        // Commentモデル作成
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        // 「/」 ルートにリダイレクト
        return redirect('/');
    }
    // ==========ここまで追加する==========
    // ==========ここから追加する==========
    public function destroy(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->delete();
        return redirect('/');
    }
    // ==========ここまで追加する==========
}
