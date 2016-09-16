<?php

declare(strict_types = 1);

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProgramLogController extends Controller
{
    use \App\Jsons\ProgramLogJson, \App\Jsons\CommonJson;

    private $user;
    private $program;
    private $program_log;

    /**
     * constructor
     * @param \App\Services\UserService       $user
     * @param \App\Services\ProgramService    $program
     * @param \App\Services\ProgramLogService $program_log
     */
    public function __construct(
        \App\Services\UserService $user,
        \App\Services\ProgramService $program,
        \App\Services\ProgramLogService $program_log
    ) {
        $this->user        = $user;
        $this->program     = $program;
        $this->program_log = $program_log;
    }

    /**
     * get program logs
     * @param  int $programId
     * @return json
     */
    public function index($programId)
    {
        if(!is_numeric($programId)) {
            return response()->json($this->invalidParameter(), 400);
        }
        $logs = $this->program_log->getByProgramId(intval($programId));

        return response()->json($this->successGotProgramLogs($logs), 200);
    }

    /**
     * create program logs
     * @param  int $programId_
     * @return json
     */
    public function create(Request $request, $programId)
    {
        $data = $request->only('price');

        if(!is_numeric($programId)) {
            return response()->json($this->invalidParameter(), 400);
        }
        if(empty($data['price']) || !is_numeric($data['price'])) {
            return response()->json($this->invalidArgument(), 400);
        }
        if(!$this->program->isExist(intval($programId))) {
            return response()->json($this->notExistedProgram(), 400);
        }
        $this->program_log->create(intval($programId), (float)$data['price']);
        $this->program->updatePrice(intval($programId), (float)$data['price']);

        return response()->json($this->successCreatedProgramLog(), 201);
    }
}
