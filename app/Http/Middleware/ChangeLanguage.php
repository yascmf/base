<?php

namespace App\Http\Middleware;

use Closure;

use App\Jobs\SetLocale;

use Illuminate\Bus\Dispatcher as BusDispatcher;

class ChangeLanguage
{

    /**
     * The command bus.
     *
     * @array $bus
     */
    protected $bus;

    /**
     * The command bus.
     *
     * @array $bus
     */
    protected $setLocale;

    /**
     * Create a new App instance.
     *
     * @param  Illuminate\Bus\Dispatcher $bus
     * @param  App\Jobs\SetLocale $setLocale
     * @return void
    */
    public function __construct(
        BusDispatcher $bus,
        SetLocale $setLocale)
    {
        $this->bus = $bus;
        $this->setLocale = $setLocale;
    }

    /**
     * Handle an incoming request.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $site = null)
    {
        $this->bus->dispatch($this->setLocale);

        return $next($request);
    }

}
