<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    // ==========ここから追加する==========
    // 「１対１」→ メソッド名は単数形
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    // ==========ここまで追加する==========
    // ==========ここから追加する==========
    // 「１対１」→ メソッド名は単数形
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    // ==========ここまで追加する==========
}
