<?php

namespace App\Http\Middleware;

use Closure;
use App\Post;

class CheckPermissionsMiddleware
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

        if(!check_user_permissions($request)){
            abort(403,"Forbidden access");
        }
        
        return $next($request);
    }
}
