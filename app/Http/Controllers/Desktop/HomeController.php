<?php

namespace App\Http\Controllers\Desktop;

use Illuminate\Http\Request;

use Crypt;
use Auth;
use App\Jobs\ChangeLocale;

class HomeController extends FrontController
{

    /**
     * YASCMF index
     */
    public function getIndex()
    {
        return view('desktop.index');
    }


    /**
     * Change Language
     */
    public function getLang(ChangeLocale $changeLocale)
    {
        $this->dispatch($changeLocale);

        return redirect()->back();
    }

}
