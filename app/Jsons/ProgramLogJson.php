<?php

declare(strict_types = 1);

namespace App\Jsons;

trait ProgramLogJson
{
    public function successGotProgramLogs($data_) : array
    {
        return [
            'status'  => 'success',
            'code'    => 200,
            'data'    => $data_,
            'message' => 'success get program logs'
        ];
    }

    /**
     * create program log
     * @return array
     */
    private function successCreatedProgramLog() : array
    {
        return [
            'status'  => 'success',
            'code'    => 201,
            'message' => 'success create program log'
        ];
    }
}
