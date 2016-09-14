<?php

declare(strict_types = 1);

namespace App\Jsons;

trait UserJson
{
    /**
     * json format if register userdata successfully
     * @return array
     */
    private function successRegistered() : array
    {
        return [
            'status'  => 'created',
            'code'    => 201,
            'message' => 'registered userdata successfully'
        ];
    }

    /**
     * json format if register userdata NOT successfully
     * @return array
     */
    private function failureRegistered() : array
    {
        return [
            'status'  => 'failure',
            'code'    => 400,
            'message' => 'this email has already existed'
        ];
    }
}