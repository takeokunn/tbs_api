<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProgramLog extends Model
{
    protected $table = 'program_logs';

    public function program()
    {
        return $this->belongsTo('App\Model\Program');
    }
}
