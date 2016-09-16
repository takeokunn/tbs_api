<?php

declare(strict_types = 1);

namespace App\Jsons;

trait ProgramLogJson
{
    /**
     * create program log
     * @return array
     */
    private function successCreatedProgramLog() : array
    {
        return [
            'status'  => 'success',
            'code'    => 201,
            'message' => 'success create program logs'
        ];
    }
}
