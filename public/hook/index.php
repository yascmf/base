<?php

    error_reporting(1);

    $target = '/home/wwwroot/base.yascmf.com';

    $token = 'yascmf_base';

    if ($_GET['token'] !== $token) {
        exit('error request');
    }

    //$output = shell_exec("sudo -Hu www cd $target && git pull");
    $output = shell_exec("cd $target && git pull");

    //echo '<pre>'.$output.'</pre>';
