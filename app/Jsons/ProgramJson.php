<?php

declare(strict_types = 1);

namespace App\Jsons;

trait ProgramJson
{
    /**
     * json format if success get program
     * @param  Object $data_
     * @return array
     */
    private function successGotProgram($data_) : array
    {
        return [
            'status'  => 'success',
            'code'    => 200,
            'data'    => $data_,
            'message' => 'success get programs'
        ];
    }

    /**
     * json format if success create program
     * @return array
     */
    private function successCreatedProgram() : array
    {
        return [
            'status'  => 'success',
            'code'    => 201,
            'message' => 'success create program'
        ];
    }

    /**
     * json format if failure show program
     * @return array
     */
    private function failureShowedProgram() : array
    {
        return [
            'status'  => 'failure',
            'code'    => 400,
            'message' => 'failure show program'
        ];
    }

    /**
     * json format if success show program
     * @param  Object $data_
     * @return array
     */
    private function successShowedProgram($data_) : array
    {
        return [
            'status'  => 'success',
            'code'    => 200,
            'data'    => $data_,
            'message' => 'success show program'
        ];
    }
}
