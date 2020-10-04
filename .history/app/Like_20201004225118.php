<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    // ==========ここから追加する==========
    // 「１対１」→ メソッド名は単数形
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    // ==========ここまで追加する==========
}
