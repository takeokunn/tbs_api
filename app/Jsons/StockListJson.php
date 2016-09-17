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

    /**
     * json format if success get stock buy list
     * @param  Object $data_
     * @return array
     */
    private function successGetStockBuyList($data_) : array
    {
        return [
            'status'  => 'created',
            'code'    => 200,
            'data'    => $data_,
            'message' => 'success get stock buy list'
        ];
    }
}
