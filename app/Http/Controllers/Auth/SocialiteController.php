<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName() ?? $googleUser->getNickname(),
                'email_verified_at' => now(),
            ]
        );

        Auth::login($user);

        session([
            'user' => (Auth::user()),
            'apps' => $this->groupUserRolesAndPermissions($user),
            'session_id' => session()->getId(),
        ]);

        return redirect('/dashboard');
    }
}
