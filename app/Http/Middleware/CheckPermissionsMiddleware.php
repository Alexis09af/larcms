<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermissionsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    /* hace referencia a app/helpers/permissions.php
    */
    public function handle($request, Closure $next)
    {
        if ( ! check_user_permissions($request)) {
            //abort(403, "No tienes permisos para acceder a esta sección!");
            abort(403);
        }

        return $next($request);

    }
}
