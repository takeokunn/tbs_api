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

        /**
         * get stocks by user_id
         */
        // success
        $this->getMethod(
            '/api/v1/user/stocks?token=' . $token,
            'success get stocks by user_id'
        );

        /**
         * deal stocks
         */

        // error
        $this->postMethod(
            '/api/v1/programs/hogehoge/stocks?token=' . $token,
            'invalid parameter',
            ['number' => '1', 'type' => 'buy']
        );
        $this->postMethod(
            '/api/v1/programs/1/stocks?token=' . $token,
            'invalid argument',
            ['number' => 'hoge', 'type' => 'buy']
        );
        $this->postMethod(
            '/api/v1/programs/1/stocks?token=' . $token,
            'invalid argument',
            ['number' => '', 'type' => 'buy']
        );
        $this->postMethod(
            '/api/v1/programs/1/stocks?token=' . $token,
            'invalid argument',
            ['number' => 1, 'type' => '']
        );
        $this->postMethod(
            '/api/v1/programs/1/stocks?token=' . $token,
            'invalid argument',
            ['number' => 1, 'type' => 'hoge']
        );
        $this->postMethod(
            '/api/v1/programs/11111/stocks?token=' . $token,
            'program not exist',
            ['number' => 1, 'type' => 'buy']
        );


        // buy stocks
        Artisan::call('db:seed');
        // success
        $this->postMethod(
            '/api/v1/programs/1/stocks?token=' . $token,
            'success deal stocks',
            ['number' => '1', 'type' => 'buy']
        );

        // failure
        $this->postMethod(
            '/api/v1/programs/1/stocks?token=' . $token,
            'cannot buy stocks',
            ['number' => '111', 'type' => 'buy']
        );

        // sell stocks
        Artisan::call('db:seed');
        // success
        $this->postMethod(
            '/api/v1/programs/1/stocks?token=' . $token,
            'success deal stocks',
            ['number' => '1', 'type' => 'sell']
        );

        // failure
        $this->postMethod(
            '/api/v1/programs/1/stocks?token=' . $token,
            'cannot sell stocks',
            ['number' => '111', 'type' => 'sell']
        );
    }
}
