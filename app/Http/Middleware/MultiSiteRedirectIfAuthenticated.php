<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * 多站点用户/会员认证中间件(登录跳转中间件)
 *
 * @author raoyc <raoyc2009@gmail.com>
 */
class MultiSiteRedirectIfAuthenticated
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $site
     * @return mixed
     */
    public function handle($request, Closure $next, $site = null)
    {
        $backend_home_url = config('site.route.prefix.admin', 'admin').'/dashboard';
        $desktop_home_url = config('site.route.prefix.desktop', '').'/i/welcome.html';
        switch ($site) {
            case 'admin':
                $guard = 'web';
                $home_url = $backend_home_url;
                break;
            case 'desktop':
            default:
                # code...
                $guard = 'member';
                $home_url = $desktop_home_url;
                break;
        }
        if (Auth::guard($guard)->check()) {
            return redirect($home_url);
        }

        return $next($request);
    }
}
