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


    protected function groupUserRolesAndPermissions($user)
    {
        $apps = []; // structure: app_id => ['roles' => [...], 'permissions' => [...]]

        foreach ($user->roles as $role) {
            $apps[$role->pivot->app_id]['roles'][] = $role->name;
        }

        foreach ($user->getAllPermissions() as $permission) {
            $apps[$permission->pivot->app_id]['permissions'][] = $permission->name;
        }

        return $apps;
    }
}
