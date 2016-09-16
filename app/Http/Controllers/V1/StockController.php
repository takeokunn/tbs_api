<?php

declare(strict_types = 1);

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    use \App\Jsons\ProgramJson, \App\Jsons\StockJson, \App\Jsons\CommonJson;

    private $user;
    private $stock;
    private $program;

    /**
     * constructor
     * @param \App\Services\UserService    $user
     * @param \App\Services\StockService   $stock
     * @param \App\Services\ProgramService $program
     */
    public function __construct(
        \App\Services\UserService $user,
        \App\Services\StockService $stock,
        \App\Services\ProgramService $program
    ) {
        $this->user    = $user;
        $this->stock   = $stock;
        $this->program = $program;
    }

    /**
     * get stocks
     * @param  int $programId
     * @return json
     */
    public function index($programId)
    {
        if(!is_numeric($programId)) {
            return response()->json($this->invalidParameter(), 400);
        }
        if(!$this->program->isExist(intval($programId))) {
            return response()->json($this->notExistedProgram(), 400);
        }
        $stocks = $this->stock->getByProgramId(intval($programId));

        return response()->json($this->successGotStocks($stocks), 200);
    }

    /**
     * get user stocks
     * @return json
     */
    public function myStocks()
    {
        $me = $this->user->getLoginedUser();

        $stocks = $this->stock->getByUserId($me->id);

        return response()->json($this->successGotStocksByUserId($stocks), 200);
    }
}
