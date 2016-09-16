<?php

declare(strict_types = 1);

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProgramLogTest extends TestCase
{
    public function testExample()
    {
        /**
         * get token
         */
        $token = $this->getToken();

        /**
         * get program logs
         */
        // success
        $this->getMethod(
            '/api/v1/programs/1/info?token=' . $token,
            'success get program logs'
        );
        // failure
        $this->getMethod(
            '/api/v1/programs/hogehoge/info?token=' . $token,
            'invalid parameter'
        );
    }
}
