<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\App;

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

        $apps = $this->groupUserRolesAndPermissions($user);

        $user->setRelation('roles', collect());
        $user->setRelation('permissions', collect());

        session([
            'user' => $user,
            'apps' => $apps,
            'session_id' => session()->getId()
        ]);

        $redirectUrl = session()->pull('redirect_url');

        if ($redirectUrl && filter_var($redirectUrl, FILTER_VALIDATE_URL)) {
            return redirect()->away($redirectUrl);
        }

        return redirect('/dashboard');
    }


    private function groupUserRolesAndPermissions($user)
    {
        $apps = [];

        $user->load('roles.permissions');

        foreach ($user->roles as $role) {
            $appId = $role->app_id;

            if (!isset($apps[$appId])) {
                $apps[$appId] = [
                    'name' => App::find($appId)->slug,
                    'roles' => [],
                    'permissions' => [],
                ];
            }

            $apps[$appId]['roles'][] = $role->name;

            foreach ($role->permissions as $permission) {
                $apps[$appId]['permissions'][] = $permission->name;
            }
        }

        foreach ($apps as &$appData) {
            $appData['roles'] = array_values(array_unique($appData['roles']));
            $appData['permissions'] = array_values(array_unique($appData['permissions']));
        }
        unset($appData);

        return $apps;
    }


}
