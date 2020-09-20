<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index()
    {
        //テンプレート　post/index.blade.phpを表示
        return view('post/index');
    }
}
