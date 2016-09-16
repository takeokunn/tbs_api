<?php

declare(strict_types = 1);

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    use \App\Jsons\StockJson, \App\Jsons\CommonJson;

    private $user;
    private $stock;

    /**
     * constructor
     * @param \App\Services\UserService  $user
     * @param \App\Services\StockService $stock
     */
    public function __construct(
        \App\Services\UserService $user,
        \App\Services\StockService $stock
    ) {
        $this->user    = $user;
        $this->stock = $stock;
    }
}
