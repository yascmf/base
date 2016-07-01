<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

class UserUpload extends Event
{

    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $file, $type)
    {
        //
        $this->user = $user;  //用户信息 object
        $this->file = $file;  //文件信息 array
        $this->type = $type;  //文件类型 string ('pictrue' 或 'document')
    }
}
