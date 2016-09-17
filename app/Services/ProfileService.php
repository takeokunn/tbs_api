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
     * @return Object
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
     * update profile
     * @param  int    $userId_
     * @param  string $username_
     * @param  string $description_
     * @return Object
     */
    public function update(int $userId_, string $username_, string $description_)
    {
        $profile = $this->getByUserId($userId_);
        $profile->username    = $username_;
        $profile->description = $description_;
        $profile->save();

        return $profile;
    }

    /**
     * deal tbs point (add|sub)
     * @param  int    $userId_
     * @param  string $type_ (buy | sell)
     * @param  int    $changePointNumber_
     * @return Object
     */
    public function dealStocks(int $userId_, string $type_, float $changePointNumber_)
    {
        $profile = $this->getByUserId($userId_);

        // buy stock
        if($type_ === 'buy') {
            $profile->tbs_point -= $changePointNumber_;
            $profile->save();

            return $profile;
        }

        // sell stock
        if($type_ === 'sell') {
            $profile->tbs_point += $changePointNumber_;
            $profile->save();

            return $profile;
        }
    }

    /**
     * add tbs_point
     * @param int $userId_
     * @param int $point_
     * @return Object
     */
    public function addTbsPoint(int $userId_, int $point_)
    {
        $profile = $this->getByUserId($userId_);
        $profile->tbs_point += $point_;
        $profile->save();

        return $profile;
    }

    /**
     * get profile data
     * @return Object
     */
    public function getAll()
    {
        return Profile::with('user')->orderBy('updated_at', 'desc')->get();
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

    /**
     * get tbs_point by user_id
     * @param  int    $userId_
     * @return float
     */
    public function getTbsPointByUserId(int $userId_) : float
    {
        return Profile::where('user_id', '=', $userId_)->first()->tbs_point;
    }

    public function getAccessTokenByUserId(int $userId_) : array
    {
        $profile = $this->getByUserId($userId_);

        return [
            'token' => $profile->access_token,
            'secret' => $profile->access_token_secret
        ];
    }
}
