<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function show($user_id)
    {
        $user = User::where('id', $user_id)
            ->firstOrFail();

        //テンプレート ('use/show',['user' => $user]);
        return view('user/show', ['user' => $user]);
    }
}
