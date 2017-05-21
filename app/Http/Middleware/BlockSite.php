<?php

namespace App\Http\Middleware;

use Closure;
use Exception;

/**
 * Class BlockSite
 *
 * 多服务器部署站点拦截
 *
 * @package App\Http\Middleware
 * @author raoyc <raoyc2009@gmail.com>
 */
class BlockSite
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string $site
     * @return mixed
     */
    public function handle($request, Closure $next, $site)
    {

        $host = ltrim(url('/'), 'http:');
        $host = ltrim($host, 'https:');
        $site_host = ltrim(config('site.route.domain.'.$site), 'http:');
        $site_host = ltrim($site_host, 'https:');
        $site_host = rtrim($site_host, '/');
        try {
            if($host !== $site_host) {
                throw new Exception('403 site blocked !');
            }
        } catch (Exception $e) {
            return abort(403, $e->getMessage());
        }
        return $next($request);

    }

}
