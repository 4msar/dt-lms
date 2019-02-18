<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckPermission
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
        if(!Auth::check()) return redirect()->route('login');

        $auth = Auth::user();

        $roles = config('roles')[$auth->role];

        $route = $request->route();
        $routeArray = $route->getAction();
        $controllerAction = class_basename($routeArray['controller']); 
        list($controller, $action) = explode('@', $controllerAction);


        if(isset($roles[$controller][$action]) && $roles[$controller][$action] === false){
            return redirect()->route('home')->with(['permission' => 'You have not any permission to do that!']);
        }
        return $next($request);
    }

}
