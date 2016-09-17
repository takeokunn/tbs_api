<?php

declare(strict_types = 1);

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StockListController extends Controller
{
    use \App\Jsons\StockListJson, \App\Jsons\ProgramJson, \App\Jsons\CommonJson;

    private $user;
    private $program;
    private $stock_list;

    /**
     * constructor
     * @param \App\Services\UserService $user
     * @param \App\Services\StockListService $stock_list
     */
    public function __construct(
        \App\Services\UserService $user,
        \App\Services\ProgramService $program,
        \App\Services\StockListService $stock_list
    ) {
        $this->user       = $user;
        $this->program    = $program;
        $this->stock_list = $stock_list;
    }

    /**
     * get stock buy list
     * @param  int $programId
     * @return json
     */
    public function getBuylist($programId)
    {
        if(!is_numeric($programId)) {
            return response()->json($this->invalidParameter(), 400);
        }
        if(!$this->program->isExist(intval($programId))) {
            return response()->json($this->notExistedProgram(), 400);
        }

        $stock_lists = $this->stock_list->getBuyListAll(intval($programId));

        return response()->json($this->successGotStockBuyList($stock_lists), 200);
    }

    /**
     * create stock buy list
     * @param  Request $request
     * @return json
     */
    public function createBuylist(Request $request, $programId)
    {
        $me   = $this->user->getLoginedUser();
        $data = $request->only('number', 'price', 'type');
        $type_arr = ['', 'limit', 'market'];

        // validation
        if(!is_numeric($programId)) {
            return response()->json($this->invalidParameter(), 400);
        }
        if(
            empty($data['number'])
            || empty($data['price'])
            || empty($data['type'])
            || !is_numeric($data['number'])
            || !is_numeric($data['price'])
            || !array_search($data['type'], $type_arr)
        ) {
            return response()->json($this->invalidArgument(), 400);
        }
        $this->stock_list->createBuyList($me->id, intval($programId), intval($data['number']), intval($data['price']), $data['type']);

        return response()->json($this->successCreatedStockBuyList(), 200);
    }
}
