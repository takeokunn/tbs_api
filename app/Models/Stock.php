<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function program()
    {
        return $this->belongsTo('App\Models\Program');
    }
}
