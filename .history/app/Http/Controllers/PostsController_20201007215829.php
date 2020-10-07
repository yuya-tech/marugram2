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
    // ==========ここから追加する==========
    //コンストラクタ （このクラスが呼ばれると最初にこの処理をする）
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }
    // ==========ここまで追加する==========
    // ==========ここから編集する==========
    public function index()
    {
        $posts = Post::limit(10)
            ->orderBy('created_at', 'desc')
            ->get();

        // テンプレート「post/index.blade.php」を表示します。
        return view('post/index', ['posts' => $posts]);
    }
    // ==========ここまで編集する==========
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
        // ==========ここから追加する==========
        $post->image = base64_encode(file_get_contents($request->photo));
        // ==========ここまで追加する==========
        $post->save();

        // ==========ここからコメントアウトする==========
        //$request->photo->storeAs('public/post_images', $post->id . '.jpg'); //この行はコメントアウトする
        // ==========ここまでコメントアウトする==========

        // 「/」 ルートにリダイレクト
        return redirect('/');
    }
    // ==========ここまで追加する==========
    // ==========ここから追加する==========
    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        $post->delete();
        return redirect('/');
    }
}
