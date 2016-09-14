<?php

declare(strict_types = 1);

namespace App\Jsons;

trait UserJson
{
    /**
     * json format if success register userdata
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
     * json format if failure register userdata
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

    /**
     * json format if success login
     * @param  string $token_
     * @return array
     */
    private function successLogined(string $token_) : array
    {
        return [
            'status'  => 'success',
            'code'    => 200,
            'token'   => $token_,
            'message' => 'success login'
        ];
    }

    /**
     * json format if failure login
     * @param  string $token_
     * @return array
     */
    private function failureLogined() : array
    {
        return [
            'status'  => 'failure',
            'code'    => 400,
            'message' => 'failure login'
        ];
    }

    /**
     * json format if success get mydata
     * @param  Object $data_
     * @return array
     */
    private function successGotMe($data_) : array
    {
        return [
            'status'  => 'success',
            'code'    => 200,
            'data'    => $data_,
            'message' => 'success get me'
        ];
    }
}
