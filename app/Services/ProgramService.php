<?php

declare(strict_types = 1);

namespace App\Services;

use App\Models\Program;

class ProgramService
{
    /**
     * get program data
     * @return object
     */
    public function getAll()
    {
        return Program::with('program_infos')->orderBy('updated_at', 'desc')->get();
    }
}
