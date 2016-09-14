<?php

declare(strict_types = 1);

namespace App\Jsons;

trait MiddlewareJson
{
    private function TokenNotProvided() : array
    {
        return [
            'status'  => 'error',
            'code'    => 400,
            'message' => 'token not provided'
        ];
    }

    private function TokenExpired() : array
    {
        return [
            'status'  => 'error',
            'code'    => 400,
            'message' => 'token expired'
        ];
    }

    private function TokenInpired() : array
    {
        return [
            'status'  => 'error',
            'code'    => 400,
            'message' => 'token inpired'
        ];
    }

    private function UserNotFound() : array
    {
        return [
            'status'  => 'error',
            'code'    => 404,
            'message' => 'user not found'
        ];
    }
}
