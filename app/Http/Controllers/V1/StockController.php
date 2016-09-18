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
    private $profile;
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
        \App\Services\ProfileService $profile,
        \App\Services\ProgramService $program
    ) {
        $this->user    = $user;
        $this->stock   = $stock;
        $this->profile = $profile;
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
     * deal stock
     * @param  Request $request
     * @param  int     $programId
     * @return json
     */
    public function deal(Request $request, $programId)
    {
        $data = $request->only('number', 'type');
        $me   = $this->user->getLoginedUser();
        $type_arr = ['', 'buy', 'sell'];

        // validate parameter and argument
        if(!is_numeric($programId)) {
            return response()->json($this->invalidParameter(), 400);
        }
        if(
            !is_numeric($data['number'])
            || empty($data['number'])
            || empty($data['type'])
            || !array_search($data['type'], $type_arr)
        ) {
            return response()->json($this->invalidArgument(), 400);
        }
        if(!$this->program->isExist(intval($programId))) {
            return response()->json($this->notExistedProgram(), 400);
        }

        // get program.now_price
        $now_price = $this->program->getNowPriceByProgramId(intval($programId));

        // validate weather you can deal or not
        if(
            $data['type'] === 'sell'
            &&  $this->stock->getNumberByProgramIdAndUserId(intval($programId), $me->id) - $data['number'] < 0
        ) {
            return response()->json($this->cannotSellStocks(), 400);
        }
        if(
            $data['type'] === 'buy'
            && $this->profile->getTbsPointByUserId($me->id) < $data['number'] * $now_price
        ) {
            return response()->json($this->cannotBuyStocks(), 400);
        }

        // deal stock.stock_num and change profile.tbs_point
        $this->stock->deal(intval($programId), $me->id, intval($data['number']), $data['type']);
        $this->profile->dealStocks($me->id, $data['type'], $now_price * $data['number']);

        return response()->json($this->successDealtStocks(), 200);
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

    /**
     * count program_fun by program_id
     * @param  int $programId
     * @return json
     */
    public function countUsers($programId)
    {
        if(!is_numeric($programId)) {
            return response()->json($this->invalidParameter(), 400);
        }

        $count = $this->stock->countUsersByProgramId(intval($programId));

        return response()->json($this->successCountProgramFun(intval($count)), 200);
    }

    public function countStocks($programId)
    {
        if(!is_numeric($programId)) {
            return response()->json($this->invalidParameter(), 400);
        }

        $count = $this->stock->countStocksByProgramId(intval($programId));

        return response()->json($this->successCountStocks(intval($count)), 200);
    }
}
