<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Like;
// ==========ここから追加する==========
use App\Post;
use Auth;
use Validator;
// ==========ここまで追加する==========

class LikesController extends Controller
{
    //
    // ==========ここから追加する==========
    public function store(Request $request)
    {
        // Likeモデル作成
        $like = new Like;
        $like->post_id = $request->post_id;
        $like->user_id = Auth::user()->id;
        $like->save();

        // 「/」 ルートにリダイレクト
        return redirect('/');
    }
    // ==========ここまで追加する==========
    // ==========ここから追加する==========
    public function destroy(Request $request)
    {
        $like = Like::find($request->like_id);
        $like->delete();
        return redirect('/');
    }
    // ==========ここまで追加する==========
}
