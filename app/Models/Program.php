<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';

    public function stocks()
    {
        return $this->hasMany('App\Models\Stock');
    }

    public function programInfo()
    {
        return $this->hasOne('App\Models\ProgramInfo');
    }

    public function programLog()
    {
        return $this->hasMany('App\Models\ProgramLog');
    }
}
