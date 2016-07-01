<?php

namespace App\Jobs;

use App\Jobs\Job;
use Request;
use Illuminate\Contracts\Bus\SelfHandling;

class ChangeLocale extends Job implements SelfHandling
{
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $lng = Request::input('lng', 'zh-CN');
        $site = Request::input('site', 'desktop');
        $site_langs = config('site.lang.'.$site);
        $sid = 'yascmf.lang.'.$site;

        //default Chinese (Simplified)
        $lang = session($sid, 'zh-CN');
        if (!in_array($lng, $site_langs)) {
            $lng = 'zh-CN';
        }
        if ($lang !== $lng) {
            session()->set($sid, $lng);
        }
    }

}
