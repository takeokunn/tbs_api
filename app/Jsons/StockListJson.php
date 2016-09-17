<?php

declare(strict_types = 1);

namespace App\Jsons;

trait StockListJson
{
    /**
     * json format if create stock buy list
     * @return array
     */
    private function successCreateStockBuyList() : array
    {
        return [
            'status'  => 'created',
            'code'    => 201,
            'message' => 'success create stock buy list'
        ];
    }
}
