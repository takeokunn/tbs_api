<?php

declare(strict_types = 1);

namespace App\Services;

use App\Models\Stock;

class StockService
{
    /**
     * get stocks by programId
     * @param  int    $programId_
     * @return Object
     */
    public function getByProgramId(int $programId_)
    {
        return Stock::with('user')->where('program_id', '=', $programId_)->orderBy('updated_at', 'desc')->get();
    }

    /**
     * get stocks by userId
     * @param  int    $userId_
     * @return Object
     */
    public function getByUserId(int $userId_)
    {
        return Stock::with('program')->where('user_id', '=', $userId_)->orderBy('updated_at', 'desc')->get();
    }

    /**
     * for develop
     * create stock data
     * @param  int    $userId_
     * @param  int    $programId_
     * @param  int    $number_
     * @return Object
     */
    public function create(int $userId_, int $programId_, int $number_)
    {
        $stock = new Stock;
        $stock->user_id      = $userId_;
        $stock->program_id   = $programId_;
        $stock->stock_number = $number_;
        $stock->save();

        return $stock;
    }
}
