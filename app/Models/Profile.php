<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table   = 'profiles';
    protected $guarded = ['id'];
    protected $hidden  = ['access_token', 'access_token_secret'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
