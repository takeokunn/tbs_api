<?php

declare(strict_types = 1);

namespace App\Services;

use App\Models\ProgramLog;

class OAuthService
{
    /**
     * [tweet description]
     * @param  string $token  [description]
     * @param  string $secret [description]
     * @return [type]         [description]
     */
    public function tweet(string $token, string $secret)
    {
        $request_token = [
            'token'  => $token,
            'secret' => $secret,
        ];
        \Twitter::reconfig($request_token);
        return \Twitter::postTweet(['status' => 'Test Tweet', 'format' => 'json']);
    }
}
