<?php

namespace App\Http\Middleware;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class JwtUserAuthentication extends \Tymon\JWTAuth\Middleware\BaseMiddleware
{
    use \App\Jsons\MiddlewareJson;

    public function handle($request, \Closure $next)
    {
        if (!$token = $this->auth->setRequest($request)->getToken()) {
            return response()->json($this->TokenNotProvided(), 400);
        }

        try {
            $user = $this->auth->authenticate($token);
        } catch (TokenExpiredException $e) {
            return response()->json($this->TokenExpired(), 400);
        } catch (JWTException $e) {
            return response()->json($this->TokenInpired(), 400);
        }

        if (!$user) {
            return response()->json($this->UserNotFound(), 404);
        }

        $this->events->fire('tymon.jwt.valid', $user);

        return $next($request);
    }
}
