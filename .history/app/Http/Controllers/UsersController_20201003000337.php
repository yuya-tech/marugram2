<?php

namespace App\Http\Controllers;

use App\User;
// ==========ここから追加する==========
use Auth;
// ==========ここまで追加する==========

use Validator;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|max:255',
            'user_password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
    }
}
