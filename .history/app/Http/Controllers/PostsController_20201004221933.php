<?php

namespace App\Http\Controllers;
// ==========ここから追加する==========
use App\Post;
use Auth;
use Validator;
// ==========ここまで追加する==========
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        // テンプレート「post/index.blade.php」を表示します。
        return view('post/index');
    }
    public function new()
    {
        // テンプレート「post/new.blade.php」を表示します。
        return view('post/new');
    }
    // ==========ここから追加する==========
    public function store(Request $request)
    {
        //バリデーション（入力値チェック）
        $validator = Validator::make($request->all(), ['caption' => 'required|max:255', 'photo' => 'required']);

        //バリデーションの結果がエラーの場合
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // Postモデル作成
        $post = new Post;
        $post->caption = $request->caption;
        $post->user_id = Auth::user()->id;

        $post->save();

        $request->photo->storeAs('public/post_images', $post->id . '.jpg');

        // 「/」 ルートにリダイレクト
        return redirect('/');
    }
    // ==========ここまで追加する==========
}
