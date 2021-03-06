<?php

declare(strict_types = 1);

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileTest extends TestCase
{
    public function testExample()
    {
        /**
         * get token
         */
        $token = $this->getToken();

        /**
         * show profile
         */
        // success
        $this->getMethod(
            '/api/v1/profiles/1?token=' . $token,
            'success show profile'
        );
        // failure
        $this->getMethod(
            '/api/v1/profiles/1111111?token=' . $token,
            'failure show profile'
        );
        $this->getMethod(
            '/api/v1/profiles/hogehoge?token=' . $token,
            'invalid parameter'
        );

        /**
         * update my profile
         */
        // success
        $this->postMethod(
            '/api/v1/profiles?token=' . $token,
            'success update profile',
            ['username' => 'fugafuga', 'description' => 'hogehoge']
        );
        // failure
        $this->postMethod(
            '/api/v1/profiles?token=' . $token,
            'invalid argument',
            ['username' => '', 'description' => 'hogehoge']
        );
        $this->postMethod(
            '/api/v1/profiles?token=' . $token,
            'invalid argument',
            ['username' => 'fugafuga', 'description' => '']
        );

        /**
         * get profiles
         */
        // success
        $this->getMethod(
            '/api/v1/profiles?token=' . $token,
            'success get profiles'
        );

        /**
         * buy tbs_point
         */
        // success
        $this->postMethod(
            '/api/v1/user/points?token=' . $token,
            'success buy tbs point',
            ['point' => 11]
        );
        // failure
        $this->postMethod(
            '/api/v1/user/points?token=' . $token,
            'invalid argument',
            ['point' => '']
        );
        $this->postMethod(
            '/api/v1/user/points?token=' . $token,
            'invalid argument',
            ['point' => 'hogehoge']
        );
    }
}
