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
            'message' => 'success registered'
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
            'message' => 'This email has already existed.'
        ];
    }
}