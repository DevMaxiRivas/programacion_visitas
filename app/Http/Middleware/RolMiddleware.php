<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class RolMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role, $guard = null)
    {
        $user = User::actual();

        if (!$user) {
            return response()->view('errors.403', [], 403);
        }
        
        $roles = is_array($role)
        ? $role
        : explode('|', $role);
        
        if (!$user->tiene_algun_rol($roles)) {
            return response()->view('errors.403', [], 403);
        }

        return $next($request);
    }

    public static function using($role, $guard = null)
    {
        $roleString = is_string($role) ? $role : implode('|', $role);
        $args = is_null($guard) ? $roleString : "$roleString,$guard";

        return static::class.':'.$args;
    }
}
