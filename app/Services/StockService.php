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

}
