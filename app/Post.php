<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = [
        'statement', 'live', 'evil', 'user_id',
    ];

    public function getCreatedAtAttribute($param)
    {
        return Carbon::parse($param)->diffForHumans();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function files()
    {
        return $this->hasMany('App\File');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
