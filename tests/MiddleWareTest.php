<?php

declare(strict_types = 1);

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MiddlewareTest extends TestCase
{
    public function testExample()
    {
        // get token
        $token = $this->getToken();

        /**
         * token test
         */
        // error
        $this->getMethod(
            '/api/v1/jwt_test',
            'token not provided'
        );
        $this->getMethod(
            '/api/v1/jwt_test?token=hogehoge',
            'token not provided'
        );
        $this->getMethod(
            '/api/v1/jwt_test?token=' . substr($token, 0, -1),
            'token inpired'
        );
    }
}
