<?php

declare(strict_types = 1);

namespace App\Services;

use App\Models\ProgramLog;

class ProgramLogService
{
    /**
     * create program log
     * @param  int    $programId_
     * @param  float  $price_
     * @return Object
     */
    public function create(int $programId_, float $price_)
    {
        $program = new ProgramLog;
        $program->program_id = $programId_;
        $program->price      = $price_;
        $program->save();

        return $program;
    }
}
