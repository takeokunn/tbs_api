<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProgramInfo extends Model
{
    protected $table = 'program_infos';

    public function program()
    {
        return $this->belongsTo('App\Model\Program');
    }

}
