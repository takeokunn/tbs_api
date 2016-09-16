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
}
