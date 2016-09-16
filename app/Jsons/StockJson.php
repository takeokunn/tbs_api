<?php

declare(strict_types = 1);

namespace App\Jsons;

trait StockJson
{
    /**
     * json format if success get stocks
     * @param  int $data_
     * @return array
     */
    private function successGotStocks($data_) : array
    {
        return [
            'status'  => 'success',
            'code'    => 200,
            'data'    => $data_,
            'message' => 'success get stocks'
        ];
    }
}
