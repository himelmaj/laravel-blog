<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($provider)
    {

        return Socialite::driver($provider)->stateless()->redirect();

    }

    public function callback($provider)
    {

        // dd(Socialite::driver($provider)->stateless()->user());
        $providerResult = Socialite::driver($provider)->stateless()->user();

        $user = User::updateOrCreate(
            [
                'provider_id' => $providerResult->id,
                'provider' => $provider
            ],
            [
                'username' => $providerResult->nickname,
                'email' => $providerResult->email,
                'name' => ($providerResult->name === null ? $providerResult->nickname : $providerResult->name),
                'provider_token' => $providerResult->token,
                'provider_avatar' => $providerResult->avatar,
            ]
        );

        Auth::login($user);
        return redirect('/home');



    }

}
