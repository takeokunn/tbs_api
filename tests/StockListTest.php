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
         * get stock buy list
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

        /**
         * create stock buy list
         */
        // success
        $this->postMethod(
            '/api/v1/programs/1/buylist?token=' . $token,
            'success create stock buy list',
            ['number' => 1, 'price' => 1, 'type' => 'limit']
        );
        $this->postMethod(
            '/api/v1/programs/1/buylist?token=' . $token,
            'success create stock buy list',
            ['number' => 1, 'price' => 1, 'type' => 'market']
        );

        // failure
        $this->postMethod(
            '/api/v1/programs/hogehoge/buylist?token=' . $token,
            'invalid parameter',
            ['number' => 1, 'price' => 1, 'type' => 'market']
        );
        $this->postMethod(
            '/api/v1/programs/1/buylist?token=' . $token,
            'invalid argument',
            ['number' => '', 'price' => 1, 'type' => 'market']
        );
        $this->postMethod(
            '/api/v1/programs/1/buylist?token=' . $token,
            'invalid argument',
            ['number' => 1, 'price' => '', 'type' => 'market']
        );
        $this->postMethod(
            '/api/v1/programs/1/buylist?token=' . $token,
            'invalid argument',
            ['number' => 1, 'price' => 1, 'type' => '']
        );
        $this->postMethod(
            '/api/v1/programs/1/buylist?token=' . $token,
            'invalid argument',
            ['number' => 'hoge', 'price' => 1, 'type' => 'market']
        );
        $this->postMethod(
            '/api/v1/programs/1/buylist?token=' . $token,
            'invalid argument',
            ['number' => 1, 'price' => 'hoge', 'type' => 'market']
        );
        $this->postMethod(
            '/api/v1/programs/1/buylist?token=' . $token,
            'invalid argument',
            ['number' => 1, 'price' => 1, 'type' => 'hogehoge']
        );

        /**
         * get stock sale list
         */
        // success
        $this->getMethod(
            '/api/v1/programs/1/salelist?token=' . $token,
            'success get stock sale list'
        );
        // failure
        $this->getMethod(
            '/api/v1/programs/hogehoge/salelist?token=' . $token,
            'invalid parameter'
        );
        $this->getMethod(
            '/api/v1/programs/11111/salelist?token=' . $token,
            'program not exist'
        );
    }
}
