<?php

declare(strict_types = 1);

namespace App\Jsons;

trait ProgramLogJson
{
    /**
     * json format if success get program logs
     * @param  Object $data_
     * @return array
     */
    private function successGotProgramLogs($data_) : array
    {
        return [
            'status'  => 'success',
            'code'    => 200,
            'data'    => $data_,
            'message' => 'success get program logs'
        ];
    }

    /**
     * json format if create program log
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
