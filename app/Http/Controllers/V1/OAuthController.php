<?php

declare(strict_types = 1);

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OAuthController extends Controller
{
    use \App\Jsons\OAuthJson;

    private $user;
    private $profile;

    /**
     * constructor
     * @param \App\Services\UserService    $user    [description]
     * @param \App\Services\ProfileService $profile [description]
     */
    public function __construct(
        \App\Services\UserService $user,
        \App\Services\ProfileService $profile
    ) {
        $this->user    = $user;
        $this->profile = $profile;
    }
    /**
     * login with twitter
     * @param  Request $request
     * @return json
     */
    public function loginWithTwitter(Request $request)
    {
        $token  = $request->get('oauth_token');
        $verify = $request->get('oauth_verifier');
        \OAuth::setHttpClient('CurlClient');
        $tw = \OAuth::consumer('Twitter', 'http://localhost:8000/api/v1/auth/twitter');

        if (!is_null($token) && !is_null($verify)) {
            $token = $tw->requestAccessToken($token, $verify);
            $result = json_decode($tw->request('account/verify_credentials.json'), true);

            $accessToken = $token->getAccessToken();
            $accessTokenSecret = $token->getAccessTokenSecret();

            $user = $this->user->twitterLogin($result['name'], $result['id'], $result['profile_image_url'], $accessToken, $accessTokenSecret);
            $token = $this->user->publishToken($user);

            return response()->json($this->successTwitterLogin($token), 200);
        }
        else {
            $reqToken = $tw->requestRequestToken();
            $url = $tw->getAuthorizationUri(['oauth_token' => $reqToken->getRequestToken()]);

            return redirect((string)$url);
        }
    }
}
