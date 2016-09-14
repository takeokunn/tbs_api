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
            ['email' => 'test1@gmail.com', 'password' => '1234']
        );
        // failure
        $this->postMethod(
            '/api/v1/auth/login',
            'invalid argument',
            ['email' => '', 'password' => '1234']
        );
        $this->postMethod(
            '/api/v1/auth/login',
            'invalid argument',
            ['email' => 'test1@gmail.com', 'password' => '']
        );
        $this->postMethod(
            '/api/v1/auth/login',
            'failure login',
            ['email' => 'hogehoge@yahoo.co.jp', 'password' => '1234']
        );
        $this->postMethod(
            '/api/v1/auth/login',
            'failure login',
            ['email' => 'test1@gmail.com', 'password' => 'hogehoge']
        );

        /**
         * get my data
         */
        // success
        $this->getMethod(
            '/api/v1/auth/self?token=' . $token,
            'success get me'
        );
    }
}
