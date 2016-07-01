<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * 多站点用户/会员认证中间件(游客跳转登录中间件)
 *
 * @author raoyc <raoyc2009@gmail.com>
 */
class MultiSiteAuthenticate
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
        $backend_login_url = config('site.route.prefix.admin', 'admin').'/auth/login';
        $desktop_login_url = config('site.route.prefix.desktop', '').'/i/login.html';
        switch ($site) {
            case 'admin':
                $guard = 'web';
                $login_url = $backend_login_url;
                break;
            case 'desktop':
            default:
                # code...
                $guard = 'member';
                $login_url = $desktop_login_url;
                break;
        }
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest($login_url);
            }
        }
        return $next($request);
    }
}
