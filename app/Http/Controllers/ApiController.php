<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\App;



class ApiController extends Controller
{
    public function userInfo()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'error' => 'Not authenticated',
            ], 401);
        }

        $apps = $this->groupUserRolesAndPermissions($user);

        $user->setRelation('roles', collect());
        $user->setRelation('permissions', collect());

        return response()->json([
            'user' => $user,
            'apps' => $apps,
            'session_id' => session()->getId(),
            // 'DATA' => session()->all()
        ]);
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
