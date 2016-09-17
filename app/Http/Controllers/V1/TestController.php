<?php

declare(strict_types = 1);

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    private $user;
    private $oauth;
    private $profile;

    /**
     * constructor
     * @param \App\Services\UserService    $user
     * @param \App\Services\OAuthService   $oauth
     * @param \App\Services\ProfileService $profile
     */
    public function __construct(
        \App\Services\UserService $user,
        \App\Services\OAuthService $oauth,
        \App\Services\ProfileService $profile
    ) {
        $this->user    = $user;
        $this->oauth   = $oauth;
        $this->profile = $profile;
    }

    public function tweet()
    {
        $me = $this->user->getLoginedUser();
        $access = $this->profile->getAccessTokenByUserId(intval($me->id));

        $this->oauth->tweet($access['token'], $access['secret']);
    }
}
