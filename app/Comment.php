<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment', 'live', 'evil', 'post_id', 'user_id',
    ];
}
