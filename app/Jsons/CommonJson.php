<?php

declare(strict_types = 1);

namespace App\Jsons;

trait CommonJson
{
    /**
     * json format if invalid request data
     * @return array
     */
    private function invalidArgument() : array
    {
        return [
            'status'  => 'failure',
            'code'    => 400,
            'message' => 'invalid argument'
        ];
    }

    /**
     * json format if invalid parameter
     * @return array
     */
    private function invalidParameter() : array
    {
        return [
            'status'  => 'failure',
            'code'    => 400,
            'message' => 'invalid parameter'
        ];
    }

    /**
     * json format if permission denied
     * @return array
     */
    private function noPermission() : array
    {
        return [
            'status'  => 'failure',
            'code'    => 403,
            'message' => 'you have no permission'
        ];
    }

    /**
     * json format if server error occurred
     * @param  string $error_
     * @return array
     */
    private function serverError(string $error_) : array
    {
        return [
            'status'  => 'error',
            'code'    => 500,
            'log'     => $error_,
            'message' => 'server error'
        ];
    }
}