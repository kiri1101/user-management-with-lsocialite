<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /**
     * Redirect the user to Guthub authentication page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Github
     * 
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $providerUser = Socialite::driver($provider)->user();
 
        $user = User::updateOrCreate([
            'provider_id' => $providerUser->id,
        ], [
            'username' => $providerUser->nickname,
            'name' => $providerUser->name,
            'email' => $providerUser->email,
            'profile_photo_path' => $providerUser->avatar,
            'provider_name' => $provider,
            'email_verified_at' => now(), 
            'status' => true,
            'github_token' => $providerUser->token,
            'github_refresh_token' => $providerUser->refreshToken,
        ]);
     
        Auth::login($user);
     
        return redirect()->route('user.dashboard');
    }
}
