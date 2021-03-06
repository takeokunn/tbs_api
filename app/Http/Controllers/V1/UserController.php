<?php

declare(strict_types = 1);

namespace App\Http\Controllers\V1;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    use \App\Jsons\UserJson, \App\Jsons\CommonJson;

    private $user;

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

    /**
     * user login
     * @param  Request $request
     * @return json
     */
    public function login(Request $request)
    {
        $data = $request->only('identify', 'password');

        if(empty($data['identify']) || empty($data['password'])) {
            return response()->json($this->invalidArgument(), 400);
        }
        $token = $this->user->login($data['identify'], $data['password']);
        if (empty($token)) {
            return response()->json($this->failureLogined(), 400);
        }

        return response()->json($this->successLogined($token), 200);
    }

    /**
     * get userdata
     * @return json
     */
    public function self()
    {
        $me = $this->user->getLoginedUser();

        return response()->json($this->successGotMe($me), 200);
    }


    /**
     * update userdata
     * @param  Request $request
     * @return json
     */
    public function update(Request $request)
    {
        $me   = $this->user->getLoginedUser();
        $data = $request->only('name', 'email');

        if(empty($data['name']) || empty($data['email'])) {
            return response()->json($this->invalidArgument(), 400);
        }
        $this->user->update($me->id, $data['name'], $data['email']);

        return response()->json($this->successUpdated(), 200);
    }

    /**
     * user logout
     * @return json
     */
    public function logout()
    {
        $this->user->logout();

        return response()->json($this->successLogouted(), 200);
    }
}
