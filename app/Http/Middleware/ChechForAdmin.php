<?php

namespace App\Http\Middleware;

use Closure;

class ChechForAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if ($user->role->name !== 'Admin') {
            return response()->json(['message' => 'You dont have privileges to do this action'], 403);
        }
        return $next($request);
    }
}
