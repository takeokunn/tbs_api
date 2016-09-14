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
            return response()->json($this->invalidArgument(), 400);
        }
        $profile = $this->profile->getByUserId(intval($userId));
        if(is_null($profile)) {
            return response()->json($this->failureShowProfile(), 400);
        }

        return response()->json($this->successShowProfile($profile), 200);
    }
}
