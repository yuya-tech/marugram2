<?php

namespace App\Http\Controllers;

use App\User;

use Auth;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function show($user_id)
    {
        $user = User::where('id', $user_id)
            ->firstOrFail();

        //テンプレート (use/show.blade.phpを表示します
        return view('user/show', ['user' => $user]);
    }

    public function edit()
    {
        $user = Auth::user();

        //テンプレート user/edit.blade.phpを表示します
        return view('user/edit', ['user' => $user]);
    }
}
