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

    /**
     * json format if cannot sell stocks
     * @return array
     */
    private function cannotSellStocks() : array
    {
        return [
            'status'  => 'failure',
            'code'    => 400,
            'message' => 'cannot sell stocks'
        ];
    }

    /**
     * json format if cannot buy stocks
     * @return array
     */
    private function cannotBuyStocks() : array
    {
        return [
            'status'  => 'failure',
            'code'    => 400,
            'message' => 'cannot buy stocks'
        ];
    }

    /**
     * json format if success deal stocks
     * @return array
     */
    private function successDealtStocks() : array
    {
        return [
            'status'  => 'success',
            'code'    => 200,
            'message' => 'success deal stocks'
        ];
    }

    /**
     * json format which count program fun by program_id
     * @return array
     */
    private function successCountProgramFun($count_) : array
    {
        return [
            'status'  => 'success',
            'code'    => 200,
            'count'   => $count_,
            'message' => 'success count progra_fun in stock'
        ];
    }

    /**
     * json format which count stocks by program_id
     * @return array
     */
    private function successCountStocks($count_) : array
    {
        return [
            'status'  => 'success',
            'code'    => 200,
            'count'   => $count_,
            'message' => 'success count stocks by program_id'
        ];
    }

}
