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
        $profile->user_id  = $user->id;
        $profile->username = $name_;
        $profile->save();

        return $user;
    }

    /**
     * login(jwt-auth)
     * @param  string $identify_
     * @param  string $password_
     * @return (string | null)
     */
    public function login(string $identify_, string $password_)
    {
        // if $identify_ is email
        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $identify_)) {
            $token = JWTAuth::attempt(['email' => $identify_, 'password' => $password_]);
        }
        // if $identify_ is name
        else {
            $token = JWTAuth::attempt(['name' => $identify_, 'password' => $password_]);
        }

        return $token;
    }

    /**
     * get logined user by jwt-token
     * @return Object
     */
    public function getLoginedUser()
    {
        $user_id = JWTAuth::parseToken()->authenticate()->id;

        return User::with('profile')->where('id', '=', $user_id)->first();
    }

    /**
     * update userdata
     * @param  int    $userId_
     * @param  string $name_
     * @param  string $email_
     * @return Object
     */
    public function update(int $userId_, string $name_, string $email_)
    {
        $user = User::where('id', '=', $userId_)->first();
        $user->name  = $name_;
        $user->email = $email_;
        $user->save();

        return $user;
    }

    /**
     * twitter login
     * @param  int    $name
     * @param  int    $twitterId_
     * @param  string $profile_img_url_
     * @param  string $access_token_
     * @param  string $access_token_secret
     * @return Object
     */
    public function twitterLogin(string $name, int $twitterId_, string $profile_img_url_, string $access_token_, string $access_token_secret_)
    {
        $user = User::firstOrNew(['twitter_id' => $twitterId_]);
        $user->name = empty($user->name)? $name : $user->name;
        $user->twitter_id = $twitterId_;
        $user->save();

        $profile = Profile::firstOrNew(['user_id' => $user->id]);
        $profile->profile_img_url = $profile_img_url_;
        $profile->access_token = $access_token_;
        $profile->access_token_secret = $access_token_secret_;
        $profile->save();

        return $user;
    }

    /**
     * logout(jwt-auth)
     * @return
     */
    public function logout()
    {
        $token = JWTAuth::getToken();
        if ($token) {
            JWTAuth::setToken($token)->invalidate();
        }
    }

    /**
     * publish token
     * @param  Object $user
     * @return string
     */
    public function publishToken($user) : string
    {
        return JWTAuth::fromUser($user);
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
