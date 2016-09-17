<?php

declare(strict_types = 1);

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StockListTest extends TestCase
{
    public function testExample()
    {
        /**
         * get token
         */
        $token = $this->getToken();

        /**
         * get stocklist
         */
        // success
        $this->getMethod(
            '/api/v1/programs/1/buylist?token=' . $token,
            'success get stock buy list'
        );
        // failure
        $this->getMethod(
            '/api/v1/programs/hogehoge/buylist?token=' . $token,
            'invalid parameter'
        );
        $this->getMethod(
            '/api/v1/programs/11111/buylist?token=' . $token,
            'program not exist'
        );
    }
}
