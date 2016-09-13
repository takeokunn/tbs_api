<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
}
