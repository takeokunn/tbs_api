<?php

declare(strict_types = 1);

namespace App\Jsons;

trait MiddlewareJson
{
    /**
     * json format if token not provided
     * @return array
     */
    private function TokenNotProvided() : array
    {
        return [
            'status'  => 'error',
            'code'    => 400,
            'message' => 'token not provided'
        ];
    }

    /**
     * json format if token expired
     * @return array
     */
    private function TokenExpired() : array
    {
        return [
            'status'  => 'error',
            'code'    => 400,
            'message' => 'token expired'
        ];
    }

    /**
     * json format if token inpired
     * @return array
     */
    private function TokenInpired() : array
    {
        return [
            'status'  => 'error',
            'code'    => 400,
            'message' => 'token inpired'
        ];
    }

    /**
     * json format if user not found
     * @return array
     */
    private function UserNotFound() : array
    {
        return [
            'status'  => 'error',
            'code'    => 404,
            'message' => 'user not found'
        ];
    }
}
