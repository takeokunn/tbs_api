<?php

declare(strict_types = 1);

namespace App\Services;

use App\Models\Profile;

class ProfileService
{
    /**
     * create profile(for develop)
     * @param  int    $userId_
     * @param  string $username_
     * @param  string $description_
     * @return [type]
     */
    public function create(int $userId_, string $username_, string $description_)
    {
        $profile = new Profile;
        $profile->user_id     = $userId_;
        $profile->username    = $username_;
        $profile->description = $description_;
        $profile->save();

        return $profile;
    }

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
