<?php

declare(strict_types = 1);

namespace App\Jsons;

trait ProfileJson
{
    /**
     * json format if failure show profile
     * @return array
     */
    private function failureShowProfile() : array
    {
        return [
            'status'  => 'failure',
            'code'    => 400,
            'message' => 'failure show profile'
        ];
    }

    /**
     * json format if success show profile
     * @param  Object $data_
     * @return array
     */
    private function successShowProfile($data_) : array
    {
        return [
            'status'  => 'success',
            'code'    => 200,
            'data'    => $data_,
            'message' => 'success show profile'
        ];
    }

    /**
     * json format if success update profile
     * @return array
     */
    private function successUpdateProfile() : array
    {
        return [
            'status' => 'success',
            'code' => 200,
            'message' => 'success update profile'
        ];
    }
}