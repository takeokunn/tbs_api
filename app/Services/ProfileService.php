<?php

declare(strict_types = 1);

namespace App\Services;

use App\Models\Profile;

class ProfileService
{
    /**
     * get profile by user_id
     * @param  int    $userId_
     * @return Object
     */
    public function getByUserId(int $userId_)
    {
        return Profile::with('user')->where('user_id', '=', $userId_)->first();
    }
}
