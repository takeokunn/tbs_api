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
     * get stock.number by user_id and program_id
     * @param  int    $programId_
     * @param  int    $userId_
     * @return int
     */
    public function getNumberByProgramIdAndUserId(int $programId_, int $userId_)
    {
        $number = Stock::where('user_id', '=', $userId_)
                        ->where('program_id', '=', $programId_)
                        ->first()
                        ->stock_number
        ;

        return $number;
    }


    /**
     * deal stock
     * @param  int    $programId_
     * @param  int    $userId_
     * @param  int    $number_
     * @param  string $type_
     * @return Object
     */
    public function deal(int $programId_, int $userId_, int $number_, string $type_)
    {
        // buy stocks
        if($type_ === 'buy') {
            $stock = $this->getStockByProgramIdAndUserId($programId_, $userId_);
            if(is_null($stock)) {
                return $this->create($programId_, $userId_, $number_);
            } else {
                return $this->buyStock($programId_, $userId_, $number_);
            }
        }

        // sell stocks
        if($type_ === 'sell') {
            $stock = $this->getStockByProgramIdAndUserId($programId_, $userId_);
            return $this->sellStock($programId_, $userId_, $number_);
        }
    }

    /**
     * for develop
     * create stock
     * @param  int    $programId_
     * @param  int    $userId_
     * @param  int    $number_
     * @return Object
     */
    public function create(int $programId_, int $userId_, int $number_)
    {
        $stock = new Stock;
        $stock->program_id   = $programId_;
        $stock->user_id      = $userId_;
        $stock->stock_number = $number_;
        $stock->save();

        return $stock;
    }

    /**
     * buy stock
     * @param  int    $programId_
     * @param  int    $userId_
     * @param  int    $number_
     * @return Object
     */
    private function buyStock(int $programId_, int $userId_, int $number_)
    {
        $stock = $this->getStockByProgramIdAndUserId($programId_, $userId_);
        $stock->stock_number += $number_;
        $stock->save();

        return $stock;
    }

    /**
     * sell stock
     * @param  int    $programId_
     * @param  int    $userId_
     * @param  int    $number_
     * @return Object
     */
    private function sellStock(int $programId_, int $userId_, int $number_)
    {
        $stock = $this->getStockByProgramIdAndUserId($programId_, $userId_);
        $stock->stock_number -= $number_;
        $stock->save();

        return $stock;
    }

    /**
     * get stock by program_id and user_id
     * @param  int    $programId_
     * @param  int    $userId_
     * @return Object
     */
    private function getStockByProgramIdAndUserId(int $programId_, int $userId_)
    {
        $stock = Stock::where('user_id', '=', $userId_)
                ->where('program_id', '=', $programId_)
                ->first()
        ;

        return $stock;
    }
}
