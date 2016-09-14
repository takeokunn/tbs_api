<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramLog extends Model
{
    protected $table = 'program_logs';

    public function program()
    {
        return $this->belongsTo('App\Models\Program');
    }
}
