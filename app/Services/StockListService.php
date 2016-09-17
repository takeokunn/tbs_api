<?php

declare(strict_types = 1);

namespace App\Services;

use App\Models\ProgramBuyList;

class StockListService
{
    /**
     * create stock buy list
     * @param  int    $userId_
     * @param  int    $programId_
     * @param  int    $number_
     * @param  int    $price
     * @param  string $type
     * @return Object
     */
    public function createBuyList(int $userId_, int $programId_, int $number_, int $price_, string $type_)
    {
        $stock_list = new ProgramBuyList;
        $stock_list->user_id    = $userId_;
        $stock_list->program_id = $programId_;
        $stock_list->number     = $number_;
        $stock_list->price      = $price_;
        $stock_list->type       = $type_;
        $stock_list->save();

        return $stock_list;
    }

    /**
     * get stock buy list
     * @param  int    $programId_
     * @return Object
     */
    public function getBuyListAll(int $programId_)
    {
        return ProgramBuyList::where('program_id', '=', $programId_)->get();
    }
}
