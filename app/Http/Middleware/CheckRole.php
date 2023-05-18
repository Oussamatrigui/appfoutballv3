<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{

    public function handle($request, Closure $next, ...$roles)
    {
        $user = $request->user();

        if (! $user) {
            abort(403, 'Vous ne pouvez pas avoir accès.');
        }

        if (! in_array($user->role, $roles) || ! $user->is_confirmed) {
            abort(403, 'Vous ne pouvez pas avoir accès.');
        }

        // if ($user->role === 'journalist' && $user->is_confirmed) {
        //     return redirect('/addnews');
        // }

        return $next($request);
    }
    // public function handle(Request $request, Closure $next, ...$roles)
    // {
    //     if (! in_array($request->user()->role, $roles)) {
    //         abort(403, 'Vous ne pouvez pas avoir accees.');
    //     }

    //     return $next($request);
    // }
    
    // public function handleRole(Request $request, Closure $next, ...$roles)
    // {
    //     if (!in_array($request->user()->role, $roles)) {
    //         abort(403, 'Vous ne pouvez pas avoir accès.');
    //     }

    //     return $next($request);
    // }

    // public function handleConfirmation(Request $request, Closure $next, ...$roles)
    // {
    //     if (!in_array($request->user()->is_confirmed, $roles)) {
    //         abort(403, 'Vous ne pouvez pas avoir accès.');
    //     }

    //     return $next($request);
    // }
}