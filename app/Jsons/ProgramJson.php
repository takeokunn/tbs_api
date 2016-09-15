<?php

declare(strict_types = 1);

namespace App\Jsons;

trait ProgramJson
{
    private function successGotProgram($data_) : array
    {
        return [
            'status'  => 'success',
            'code'    => 200,
            'data'    => $data_,
            'message' => 'success get programs'
        ];
    }

    private function successCreatedProgram() : array
    {
        return [
            'status'  => 'success',
            'code'    => 201,
            'message' => 'success create program'
        ];
    }
}
