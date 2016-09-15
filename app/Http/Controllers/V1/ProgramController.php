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
        $data = $request->only('identify', 'password');
    }
}
