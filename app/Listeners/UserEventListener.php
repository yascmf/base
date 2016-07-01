<?php

namespace App\Listeners;

// use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Contracts\Queue\ShouldQueue;
use App\Loggers\SystemLogger;

/**
 * Class UserEventListener
 * (管理)用户登录/登出等活动事件监听器
 *
 * @package App\Listeners
 * @author raoyc <raoyc2009@gmail.com>
 */
class UserEventListener
{

    /**
     * Handle user login events.
     */
    public function onUserLogin($event)
    {
        //
        $user = $event->user;
        info('user '.$user->nickname.'['.$user->email.'] has login');
        $log = [
            'user_id' => $user->id,
            'url'     => site_url('auth/login', 'admin'),
            'type'    => 'session',
            'content' => '管理员：'.$user->nickname.'['.$user->email.'] 登录系统。',
        ];
        SystemLogger::write($log);
    }

    /**
     * Handle user logout events.
     */
    public function onUserLogout($event)
    {
        //
        $user = $event->user;
        info('user '.$user->nickname.'['.$user->email.'] has logout');
        $log = [
            'user_id' => $user->id,
            'url'     => site_url('auth/logout', 'admin'),
            'type'    => 'session',
            'content' => '管理员：'.$user->nickname.'['.$user->email.'] 登出系统。',
        ];
        SystemLogger::write($log);
    }

    /**
     * Handle user update personal information events.
     */
    public function onUserUpdate($event)
    {
        $user = $event->user;
        info('user '.$user->nickname.'['.$user->email.'] has update his/her personal information');
        $log = [
            'user_id' => $user->id,
            'url'     => site_url('me', 'admin'),
            'type'    => 'management',
            'content' => '管理员：更新了我的账户 - 个人资料。',
        ];
        SystemLogger::write($log);
    }
    
    /**
     * Handle user upload picture file events.
     */
    public function onUserUpload($event)
    {
        $user = $event->user;
        $file = $event->file;
        $type = $event->type;
        info('user '.$user->nickname.'['.$user->email.'] uploaded a file:'.$file['original_file_name'].'->'.$file['uploaded_full_file_name']);
        $url = ($type === 'picture') ? site_url('upload/picture', 'admin') : site_url('upload/document', 'admin');
        $log = [
            'user_id' => $user->id,
            'url'     => $url,
            'type'    => 'upload',
            'content' => '管理员：上传了文件，文件原始文件名：'.$file['original_file_name'].'，上传之后保存在服务器路径为'.$file['uploaded_full_file_name'].'。',
        ];
        SystemLogger::write($log);
    }
    
    
    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen('App\Events\UserLogin', 'App\Listeners\UserEventListener@onUserLogin');
        $events->listen('App\Events\UserLogout', 'App\Listeners\UserEventListener@onUserLogout');
        $events->listen('App\Events\UserUpdate', 'App\Listeners\UserEventListener@onUserUpdate');
        $events->listen('App\Events\UserUpload', 'App\Listeners\UserEventListener@onUserUpload');
    }
}
