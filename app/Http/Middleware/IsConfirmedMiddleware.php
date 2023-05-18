<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsConfirmedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $isConfirmed)
    {
        if ($isConfirmed !== '1') {
            abort(403, 'L***admin à desactiver votre Connexion./Contactez le pour plus en detaille');
        }

        return $next($request);
    }
}
