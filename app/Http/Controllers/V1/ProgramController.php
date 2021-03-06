<?php

declare(strict_types = 1);

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProgramController extends Controller
{
    use \App\Jsons\ProgramJson, \App\Jsons\CommonJson;

    private $user;
    private $program;

    /**
     * constructor
     * @param \App\Services\UserService    $user
     * @param \App\Services\ProgramService $program
     */
    public function __construct(
        \App\Services\UserService $user,
        \App\Services\ProgramService $program
    ) {
        $this->user    = $user;
        $this->program = $program;
    }

    /**
     * get programs
     * @return json
     */
    public function index()
    {
        $programs = $this->program->getAll();

        return response()->json($this->successGotProgram($programs), 200);
    }

    /**
     * create program
     * @param  Request $request
     * @return json
     */
    public function create(Request $request)
    {
        $data = $request->only('name');

        if(empty($data['name'])) {
            return response()->json($this->invalidArgument(), 400);
        }
        $this->program->create($data['name']);

        return response()->json($this->successCreatedProgram(), 201);
    }

    /**
     * show program
     * @param  int $programId
     * @return json
     */
    public function show($programId)
    {
        if(!is_numeric($programId)) {
            return response()->json($this->invalidParameter(), 400);
        }
        $program = $this->program->getByProgramId(intval($programId));
        if(is_null($program)) {
            return response()->json($this->failureShowedProgram(), 400);
        }

        return response()->json($this->successShowedProgram($program), 200);
    }

    /**
     * update program
     * @param  int $programId
     * @return json
     */
    public function update(Request $request, $programId)
    {
        $data = $request->only('name');

        if(!is_numeric($programId)) {
            return response()->json($this->invalidParameter(), 400);
        }
        if(empty($data['name'])) {
            return response()->json($this->invalidArgument(), 400);
        }
        if(!$this->program->isExist(intval($programId))) {
            return response()->json($this->notExistedProgram(), 400);
        }
        $this->program->updateName(intval($programId), $data['name']);

        return response()->json($this->successUpdatedProgram(), 200);

    }
}
