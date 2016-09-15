<?php

declare(strict_types = 1);

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    use \App\Jsons\ProfileJson, \App\Jsons\CommonJson;

    private $user;
    private $profile;

    /**
     * constructor
     * @param \App\Services\UserService    $user
     * @param \App\Services\ProfileService $profile
     */
    public function __construct(
        \App\Services\UserService $user,
        \App\Services\ProfileService $profile
    ) {
        $this->user    = $user;
        $this->profile = $profile;
    }

    /**
     * show profile
     * @param  int $userId
     * @return json
     */
    public function show($userId)
    {
        if(!is_numeric($userId)) {
            return response()->json($this->invalidParameter(), 400);
        }
        $profile = $this->profile->getByUserId(intval($userId));
        if(is_null($profile)) {
            return response()->json($this->failureShowedProfile(), 400);
        }

        return response()->json($this->successShowedProfile($profile), 200);
    }

    /**
     * update my profile
     * @param  Request $request
     * @return json
     */
    public function update(Request $request)
    {
        $me   = $this->user->getLoginedUser();
        $data = $request->only('username', 'description');

        if(empty($data['username']) || empty($data['description'])) {
            return response()->json($this->invalidArgument(), 400);
        }
        $this->profile->update($me->id, $data['username'], $data['description']);

        return response()->json($this->successUpdatedProfile(), 200);
    }
}
