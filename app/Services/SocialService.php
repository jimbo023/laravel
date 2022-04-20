<?php

namespace App\Services;

use App\Contracts\Social;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialContract;

class SocialService implements Social
{
    public function authUser(SocialContract $socialUser)
    {
        $user = User::where('email', $socialUser->getEmail())->first();
        if($user){
            $user->name = $socialUser->getName();
            $user->avatar = $socialUser->getAvatar();
            if($user->save()){
                Auth::loginUsingId($user->id);
                return route('account');
            }
            throw new Exception('WRONG: user not found');
        } else {
            if($socialUser->getName()){
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'avatar' => $socialUser->getAvatar(),
                    'email' => $socialUser->getEmail(),
                ]);
            } else {
                $user = User::create([
                    'name' => $socialUser->getNickname(),
                    'avatar' => $socialUser->getAvatar(),
                    'email' => $socialUser->getEmail(),
                ]);
            }
            $user->oauth_login = true;
            $user->save();
            Auth::loginUsingId($user->id);
            // todo: register here or redirect on register
            return route('account');
        }
    }
}