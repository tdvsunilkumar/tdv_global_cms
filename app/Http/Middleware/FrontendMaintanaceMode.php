<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\Controller;

class FrontendMaintanaceMode
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
        $controller = new Controller;
        $settings   = $controller->mapedSettings;
        if(isset($settings['is_maintenance_mode']) && $settings['is_maintenance_mode'] == 1){
            return redirect('under-construction');
        }
        return $next($request);
    }
}
