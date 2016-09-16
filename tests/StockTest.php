<?php

declare(strict_types = 1);

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StockTest extends TestCase
{
    public function testExample()
    {
        /**
         * get token
         */
        $token = $this->getToken();

        /**
         * get stocks
         */
        // success
        $this->getMethod(
            '/api/v1/programs/1/stocks?token=' . $token,
            'success get stocks'
        );
        // failure
        $this->getMethod(
            '/api/v1/programs/hogehoge/stocks?token=' . $token,
            'invalid parameter'
        );
        $this->getMethod(
            '/api/v1/programs/111111/stocks?token=' . $token,
            'program not exist'
        );
    }
}
