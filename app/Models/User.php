<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $hidden = ['password', 'twitter_id', 'facebook_id'];

    public function profile()
    {
        return $this->hasOne('App\Model\Profile');
    }

    public function stocks()
    {
        return $this->hasMany('App\Model\Stock');
    }
}
