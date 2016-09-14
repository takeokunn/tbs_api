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

    public function programInfo()
    {
        return $this->hasOne('App\Model\ProgramInfo');
    }

    public function programLog()
    {
        return $this->hasMany('App\Model\ProgramLog');
    }
}
