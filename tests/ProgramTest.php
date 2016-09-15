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
         * initialize db seed && get token
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
    }
}
