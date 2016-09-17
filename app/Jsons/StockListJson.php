<?php

declare(strict_types = 1);

namespace App\Jsons;

trait StockListJson
{
    /**
     * json format if create stock buy list
     * @return array
     */
    private function successCreatedStockBuyList() : array
    {
        return [
            'status'  => 'create',
            'code'    => 201,
            'message' => 'success create stock buy list'
        ];
    }

    /**
     * json format if success get stock buy list
     * @param  Object $data_
     * @return array
     */
    private function successGotStockBuyList($data_) : array
    {
        return [
            'status'  => 'success',
            'code'    => 200,
            'data'    => $data_,
            'message' => 'success get stock buy list'
        ];
    }

    /**
     * json format if success get stock sale list
     * @param  Object $data_
     * @return array
     */
    private function successGotStockSaleList($data_) : array
    {
        return [
            'status'  => 'success',
            'code'    => 200,
            'data'    => $data_,
            'message' => 'success get stock sale list'
        ];
    }
}
