<?php

declare(strict_types = 1);

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    public function testExample()
    {
        /**
         * initialize db seed && get token
         */
        Artisan::call('db:seed');
        $token = $this->getToken();

        /**
         * register user
         */
        // success
        $this->postMethod(
            '/api/v1/auth/register',
            'registered userdata successfully',
            ['name' => 'fugafuga', 'email' => 'aaa@gmail.com', 'password' => '1234']
        );

        // failure
        $this->postMethod(
            '/api/v1/auth/register',
            'this email has already existed',
            ['name' => 'fugafuga', 'email' => 'aaa@gmail.com', 'password' => '1234']
        );
        $this->postMethod(
            '/api/v1/auth/register',
            'invalid argument',
            ['name' => 'fugafuga', 'email' => 'ccc@gmail.com', 'password' => '']
        );
        $this->postMethod(
            '/api/v1/auth/register',
            'invalid argument',
            ['name' => 'fugafuga', 'email' => '', 'password' => '1234']
        );
        $this->postMethod(
            '/api/v1/auth/register',
            'invalid argument',
            ['name' => 'foobar', 'email' => 'bbb@gmail.com', 'password' => '']
        );

        /**
         * user login
         */
        // success
        $this->postMethod(
            '/api/v1/auth/login',
            'success login',
            ['identify' => 'test1@gmail.com', 'password' => '1234']
        );
        $this->postMethod(
            '/api/v1/auth/login',
            'success login',
            ['identify' => 'test1', 'password' => '1234']
        );
        // failure
        $this->postMethod(
            '/api/v1/auth/login',
            'invalid argument',
            ['identify' => '', 'password' => '1234']
        );
        $this->postMethod(
            '/api/v1/auth/login',
            'invalid argument',
            ['identify' => 'test1@gmail.com', 'password' => '']
        );
        $this->postMethod(
            '/api/v1/auth/login',
            'failure login',
            ['identify' => 'hogehoge@yahoo.co.jp', 'password' => '1234']
        );
        $this->postMethod(
            '/api/v1/auth/login',
            'failure login',
            ['identify' => 'test1@gmail.com', 'password' => 'hogehoge']
        );

        /**
         * get my data
         */
        // success
        $this->getMethod(
            '/api/v1/auth/self?token=' . $token,
            'success get me'
        );

        /**
         * update my data
         */
        // success
        $this->postMethod(
            '/api/v1/auth/update?token=' . $token,
            'success updated',
            ['name' => 'hoge', 'email' => 'fugafuga']
        );
        // failure
        $this->postMethod(
            '/api/v1/auth/update?token=' . $token,
            'invalid argument',
            ['name' => '', 'email' => 'fugafuga']
        );
        $this->postMethod(
            '/api/v1/auth/update?token=' . $token,
            'invalid argument',
            ['name' => 'hoge', 'email' => '']
        );

        /**
         * user logout
         */
        // success
        $this->getMethod(
            '/api/v1/auth/logout?token=' . $token,
            'success logouted'
        );
    }
}
