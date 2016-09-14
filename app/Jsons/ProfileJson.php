<?php

declare(strict_types = 1);

namespace App\Jsons;

trait ProfileJson
{
    private function failureShowProfile() : array
    {
        return [
            'status'  => 'failure',
            'code'    => 400,
            'message' => 'failure show profile'
        ];
    }

    private function successShowProfile($data_) : array
    {
        return [
            'status'  => 'success',
            'code'    => 200,
            'data'    => $data_,
            'message' => 'success show profile'
        ];
    }
}