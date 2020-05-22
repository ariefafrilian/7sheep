<?php

namespace App;

use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Notifications\Notifiable;

class User extends EloquentUser
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'permissions', 'last_login', 'first_name', 'last_name', 'gender', 'birth', 'city', 'address', 'phone', 'terms',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'permissions', 'terms',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
