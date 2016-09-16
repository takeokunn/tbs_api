<?php

declare(strict_types = 1);

namespace App\Jsons;

trait StockJson
{
    /**
     * json format if success get stocks
     * @param  Object $data_
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

    /**
     * json format if success create stock
     * @return array
     */
    private function successDealedStock() : array
    {
        return [
            'status'  => 'success',
            'code'    => 200,
            'message' => 'success create stock'
        ];
    }

    /**
     * json format if success get stocks by user_id
     * @param  Object $data_
     * @return array
     */
    private function successGotStocksByUserId($data_) : array
    {
        return [
            'status'  => 'success',
            'code'    => 200,
            'data'    => $data_,
            'message' => 'success get stocks by user_id'
        ];
    }
}
