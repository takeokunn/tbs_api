<?php

declare(strict_types = 1);

namespace App\Services;

use JWTAuth;
use App\Models\{User, Profile};

class UserService
{
    /**
     * save (user | profile) data
     * @param  string   $name_
     * @param  string   $email_
     * @param  string   $password_
     * @param  int|null $twitterId_
     * @param  int|null $facebookId_
     * @return Object
     */
    public function registerUser(string $name_, string $email_, string $password_, int $twitterId_ = null, int $facebookId_ = null)
    {
        $user = new User;
        $user->name        = $name_;
        $user->email       = $email_;
        $user->password    = bcrypt($password_);
        $user->twitter_id  = $twitterId_;
        $user->facebook_id = $facebookId_;
        $user->save();

        $profile = new Profile;
        $profile->user_id = $user->id;
        $profile->save();

        return $user;
    }

    /**
     * login(jwt-auth)
     * @param  string $email_
     * @param  string $password_
     * @return (string | null)
     */
    public function login(string $email_, string $password_)
    {
        $token = JWTAuth::attempt(['email' => $email_, 'password' => $password_]);

        return $token? $token : null;
    }

    /**
     * whether email is existed in User table or not
     * @param  string  $email_
     * @return boolean
     */
    public function isEmailExisted(string $email_) : bool
    {
        return (bool)User::where('email', '=', $email_)->count();
    }
}
