<?php

declare(strict_types = 1);

namespace App\Http\Controllers\V1;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    use \App\Jsons\UserJson, \App\Jsons\CommonJson;

    private $user = null;

    /**
     * constructor
     * @param \App\Services\UserService $user
     */
    public function __construct(
        \App\Services\UserService $user
    ) {
        $this->user = $user;
    }

    /**
     * register New User
     * @param  Request $request
     * @return json
     */
    public function register(Request $request)
    {
        $data = $request->only('name', 'email', 'password');

        if(empty($data['name']) || empty($data['email']) || empty($data['password'])) {
            return response()->json($this->invalidArgument(), 400);
        }
        if($this->user->isEmailExisted($data['email'])) {
            return response()->json($this->failureRegistered(), 400);
        }
        $user = $this->user->registerUser($data['name'], $data['email'], $data['password']);

        return response()->json($this->successRegistered(), 201);
    }
}
