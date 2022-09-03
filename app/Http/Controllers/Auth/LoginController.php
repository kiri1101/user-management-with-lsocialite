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
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from Github
     * 
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $githubUser = Socialite::driver('github')->user();
 
        $user = User::updateOrCreate([
            'provider_id' => $githubUser->id,
        ], [
            'username' => $githubUser->nickname,
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'profile_photo_path' => $githubUser->avatar,
            'provider_name' => 'Github',
            'email_verified_at' => now(), 
            'status' => true,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
     
        Auth::login($user);
     
        return redirect()->route('user.dashboard');
    }

    /**
     * Redirect the user to Google authentication page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google
     * 
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleProviderCallback()
    {
        $googleUser = Socialite::driver('google')->user();
 
        $user = User::updateOrCreate([
            'provider_id' => $googleUser->id,
        ], [
            'username' => $googleUser->nickname,
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'profile_photo_path' => $googleUser->avatar,
            'provider_name' => 'Google',
            'email_verified_at' => now(), 
            'status' => true,
        ]);
     
        Auth::login($user);
     
        return redirect()->route('user.dashboard');
    }
}
