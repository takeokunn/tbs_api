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

    public function program_info()
    {
        return $this->hasOne('App\Models\ProgramInfo');
    }

    public function program_log()
    {
        return $this->hasMany('App\Models\ProgramLog');
    }
}
