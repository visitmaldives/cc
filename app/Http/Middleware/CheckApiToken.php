<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckApiToken
{
    public function handle(Request $request, Closure $next)
    {
        $authHeader = $request->header('Authorization');

        if (!$authHeader || !preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            return response()->json(['error' => 'Unauthorized: Missing or invalid token'], 401);
        }

        $token = $matches[1];

        if ($token !== env('VAUTH_TOKEN')) {
            return response()->json(['error' => 'Unauthorized: Invalid token'], 401);
        }

        return $next($request);
    }
}
