<?php

namespace App\Http\Controllers;

use App\User;
// ==========ここから追加する==========
use Auth;
// ==========ここまで追加する==========
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function show($user_id)
    {
        $user = User::where('id', $user_id)
            ->firstOrFail();

        // テンプレート「user/show.blade.php」を表示します。
        return view('user/show', ['user' => $user]);
    }
    // ==========ここから追加する==========
    public function edit()
    {
        $user = Auth::user();

        // テンプレート「user/edit.blade.php」を表示します。
        return view('user/edit', ['user' => $user]);
    }
    // ==========ここまで追加する==========
}
