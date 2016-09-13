<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';

    public function stocks()
    {
        return $this->hasMany('App\Model\Stock');
    }
}
