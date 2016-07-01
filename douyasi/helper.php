<?php

/**
 * Get Douyasi third-party package directory：\douyasi
 *
 * @return string
 **/
function dys_path() {
    $dir = dirname(dirname(__FILE__));
    return $dir;
}


/**
 * Get Dictionary config
 *
 * @return mixed
 */
function dict($dot_key = null, $default = null)
{
    $dict = app('Douyasi\Dict');
    return $dict->getDict($dot_key, $default);
}
