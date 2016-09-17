<?php

declare(strict_types = 1);

namespace App\Jsons;

trait OAuthJson
{
    /**
     * json format if success twitter login
     * @param  string $token_
     * @return array
     */
    private function successTwitterLogin($token_) : array
    {
        return [
            'status'  => 'success',
            'code'    => 200,
            'token'   => $token_,
            'message' => 'success twitter login'
        ];
    }
}