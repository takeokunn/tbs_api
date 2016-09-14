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
         * initialize db seed && get token
         */
        Artisan::call('db:seed');
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
    }
}
