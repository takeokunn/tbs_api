<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract
{
    use Authenticatable, Authorizable;

    protected $table = 'users';
    protected $hidden = ['password', 'twitter_id', 'facebook_id'];

    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    public function stocks()
    {
        return $this->hasMany('App\Models\Stock');
    }
}
