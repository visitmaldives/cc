<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralApiController extends Controller
{
    public function userInfo()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'error' => 'Not authenticated',
            ], 401);
        }

        return response()->json([
            'user' => new UserResource($user),
            'apps' => $this->groupUserRolesAndPermissions($user),
            'session_id' => session()->getId(),
        ]);
    }

    private function groupUserRolesAndPermissions($user)
    {
        $apps = [];

        // Group roles by app prefix
        foreach ($user->getRoleNames() as $role) {
            if (preg_match('/^(.*)_(.*)$/', $role, $matches)) {
                [$full, $app, $roleName] = $matches;
                $apps[$app]['roles'][] = $roleName;
            }
        }

        // Group permissions by app prefix
        foreach ($user->getAllPermissions() as $permission) {
            if (preg_match('/^(.*)_(.*)$/', $permission->name, $matches)) {
                [$full, $app, $permName] = $matches;
                $apps[$app]['permissions'][] = $permName;
            }
        }

        // Deduplicate
        foreach ($apps as &$appData) {
            $appData['roles'] = array_values(array_unique($appData['roles'] ?? []));
            $appData['permissions'] = array_values(array_unique($appData['permissions'] ?? []));
        }

        return $apps;
    }
}
