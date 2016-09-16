<?php

declare(strict_types = 1);

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProgramTest extends TestCase
{
    public function testExample()
    {
        /**
         * get token
         */
        $token = $this->getToken();

        /**
         * get programs
         */
        // success
        $this->getMethod(
            '/api/v1/programs?token=' . $token,
            'success get programs'
        );

        /**
         * create program
         */
        // success
        $this->postMethod(
            '/api/v1/programs?token=' . $token,
            'success create program',
            ['name' => 'fugafuga']
        );
        // failure
        $this->postMethod(
            '/api/v1/programs?token=' . $token,
            'invalid argument',
            ['name' => '']
        );

        /**
         * show programs
         */
        // success
        $this->getMethod(
            '/api/v1/programs/1?token=' . $token,
            'success show program'
        );
        // failure
        $this->getMethod(
            '/api/v1/programs/1111111?token=' . $token,
            'failure show program'
        );
        $this->getMethod(
            '/api/v1/programs/hogehoge?token=' . $token,
            'invalid parameter'
        );

        /**
         * update program
         */
        // success
        $this->postMethod(
            '/api/v1/programs/1?token=' . $token,
            'success update program',
            ['name' => 'fugafuga']
        );
        // failure
        $this->postMethod(
            '/api/v1/programs?token=' . $token,
            'invalid argument',
            ['name' => '']
        );
        $this->postMethod(
            '/api/v1/programs/hogehoge?token=' . $token,
            'invalid parameter',
            ['name' => 'fugafuga']
        );
    }
}
