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
        return Program::orderBy('updated_at', 'desc')->get();
    }

    /**
     * get program by program_id
     * @param  int    $programId_
     * @return Object
     */
    public function getByProgramId(int $programId_)
    {
        return Profile::with('program_id')->where('id', '=', $programId_)->get();
    }

    /**
     * create program
     * @param  string $name_
     * @return Object
     */
    public function create(string $name_)
    {
        $program = new Program;
        $program->name = $name_;
        $program->save();

        return $program;
    }
}
