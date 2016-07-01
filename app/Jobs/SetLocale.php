<?php

namespace App\Jobs;

use App\Jobs\Job;
use Request;
use Illuminate\Contracts\Bus\SelfHandling;

class SetLocale extends Job implements SelfHandling
{
    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $site = Request::input('site', 'desktop');
        $site_langs = config('site.lang.'.$site);
        $sid = 'yascmf.lang.'.$site;
        if (!session()->has($sid)) {
            session()->put($sid, Request::getPreferredLanguage($site_langs));
        }

        app()->setLocale(session($sid));
    }
}
