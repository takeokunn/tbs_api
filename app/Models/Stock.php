<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function program()
    {
        return $this->belongsTo('App\Model\Program');
    }
}
