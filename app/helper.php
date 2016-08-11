<?php

/**
 * Get Laravel app version
 *
 * @return string
 **/
function app_version() {
    $app = app();
    return "Laravel ".$app::VERSION;
}

/**
 * Get YASMF version
 * @return string
 */
function yascmf_version() {
    $app = app();
    return "YASCMF/BASE v5.2";
}

if (!function_exists('cdn')) {

    /**
     * Generate cdn and scheme-less asset url
     *
     * @param string $path
     * @param string $sub_dir
     * @param boolean $scheme_less
     * @return string
     */
    function cdn($path, $sub_dir = '', $scheme_less = true)
    {
        if (config('site.asset.cdn.status') === 'on') {
            $host = config('site.asset.cdn.url') ? : app('url')->asset('');
            return external_link($path, $sub_dir, $scheme_less, $host);
        } else {
            return internal_link($path, $sub_dir, $scheme_less);
        }
    }

}

if (!function_exists('internal_link')) {

    /**
     * Generate internal link url
     *
     * @param string $path
     * @param string $sub_dir
     * @param boolean $scheme_less
     * @return string
     */
    function internal_link($path, $sub_dir, $scheme_less = true)
    {
        $host = app('url')->asset('');
        $sub_dir = ($sub_dir === '') ? $sub_dir : trim($sub_dir, '/').'/';
        if ($scheme_less) {
            $root = ltrim($host, 'https:');
            $root = ltrim($root, 'http:');
        } else {
            $root = $host;
        }
        return rtrim($root, '/').'/'.$sub_dir.trim($path, '/');
    }
}


if (!function_exists('external_link')) {

    /**
     * Generate external link url (sometimes equal internal_link)
     *
     * @param string $path
     * @param string $sub_dir
     * @param boolean $scheme_less
     * @return string
     */
    function external_link($path, $sub_dir, $scheme_less = true, $host = '')
    {
        if ($host === '') {
            $host = app('url')->asset('');
        }
        $sub_dir = ($sub_dir === '') ? $sub_dir : trim($sub_dir, '/').'/';
        if ($scheme_less) {
            $root = ltrim($host, 'https:');
            $root = ltrim($root, 'http:');
        } else {
            $root = $host;
        }
        $full_path = $sub_dir.trim($path, '/');
        $pattern = config('site.asset.cdn.pattern');
        if (is_string($pattern) && !empty($pattern)) {
            $count = preg_match($pattern, $full_path);
            if ($count > 0) {
                return rtrim($root, '/').'/'.$sub_dir.trim($path, '/');
            } else {
                return internal_link($path, $sub_dir, $scheme_less);
            }
        } else {
            return rtrim($root, '/').'/'.$sub_dir.trim($path, '/');
        }
    }
}


if (!function_exists('_asset')) {

    /**
     * alias helper for site asset , equal to cdn()
     */
    function _asset($path, $sub_dir = '', $scheme_less = true)
    {
        return cdn($path, $sub_dir, $scheme_less);
    }

}

if (!function_exists('site_url')) {

    /**
     * Generate scheme-less url (not for static asset files) for multi sites
     * site_url('auth/login', 'mobile') === '//example.com/m/auth/login'
     *
     * @param string $path
     * @param string $site
     * @param boolean $scheme_less
     * @return string
     */
    function site_url($path, $site = 'desktop', $scheme_less = true)
    {

        if (!in_array($site, config('site.route.group'))) {
            $site = 'desktop';
        }
        $sub_dir = config('site.route.prefix.'.$site, '');
        return internal_link($path, $sub_dir, $scheme_less);
    }

}


if (!function_exists('site_path')) {

    /**
     * Generate site path (relative to root path)
     * site_path('role/create', 'admin') === 'admin/role/create'
     *
     * @param string $path
     * @param string $site
     * @return string
     */
    function site_path($path, $site = 'desktop')
    {

        if (!in_array($site, config('site.route.group'))) {
            $site = 'desktop';
        }
        $sub_dir = config('site.route.prefix.'.$site, '');
        return $sub_dir.'/'.trim($path, '/');
    }

}


if (!function_exists('_route')) {

    /**
     * Generate site route for Multi-site RESTFUL URL
     * _route('admin:res.index') === '//example.com/admin/res'
     * _route('admin:res.create') === '//example.com/admin/res/create'
     * _route('admin:res.create', [ 'lang' =>'chs' ]) === '//example.com/admin/res/create?lang=chs'
     * _route('admin:res.store') === '//example.com/admin/res'
     * _route('admin:res.show') === '//example.com/admin/res/{id}'
     * _route('admin:res.edit') === '//example.com/admin/res/{id}/edit'
     * _route('admin:res.edit', 5) === '//example.com/admin/res/5/edit'
     * _route('admin:res.edit', [5, 'lang' => 'chs']) === '//example.com/admin/res/5/edit?lang=chs'
     * _route('admin:res.update') === '//example.com/admin/res/{id}'
     * _route('admin:res.destroy') === '//example.com/admin/res/{id}'
     * _route('admin:user.photo') === '//example.com/admin/user/photo'
     * _route('admin:user.{id}.block', 5) === '//example.com/admin/user/5/blo
     * _route('admin:user.{uid}.photo.{pid}', [4, 5, 'lang' => 'chs']);  //等价于 '//example.com/admin/user/4/photo/5?lang=chs'
     *
     * @param string $name
     * @param int|string|array $parameters
     * @return string
     */
    function _route($name, $parameters = [])
    {
        $segments = explode(':', $name);
        if (count($segments) != 2) {
            throw new Exception("{$name} - Invalid site route name !");
        } else {
            $_site = $segments[0];
            $_query = '';
            $_ids = [];
            $path = explode('.', $segments[1]);
            $last = last($path);
            array_pop($path);
            $_path = implode('/', $path);
            switch ($last) {
                case 'index':
                case 'store':
                    break;
                case 'create':
                    $_path .= '/create';
                    break;
                case 'show':
                case 'update':
                case 'destroy':
                    $_path .= '/{id}';
                    break;
                case 'edit':
                    $_path .= '/{id}/edit';
                    break;
                default:
                    $_path .= '/'.$last;
                    break;
            }
            $parameters = is_array($parameters) ? $parameters : [$parameters];
            if (count($parameters) !== 0) {
                $_query = http_build_query(
                    $params = array_where($parameters, function($key, $value) {
                        return is_string($key);
                    })
                );
                $ids = array_where($parameters, function($key, $value) {
                        //return ($key === 0);
                        return is_int($key);
                    }
                );
                $_ids = $ids;
            }
            preg_match_all('/\{(\w+?)\}/', $_path, $matches);
            array_map(function($m, $r) use (&$_path) {
                    if(isset($r)) {
                        $_path = str_replace($m, $r, $_path);
                    }
            }, $matches[0], $_ids);
            $_site_url = site_url($_path, $_site, true);
            $_url = empty($_query) ? $_site_url : $_site_url.'?'.trim($_query, '&');
            return $_url;
        }
    }

}

if (!function_exists('ref')) {

    /**
     * Get given site asset path by an alias name
     *
     * @param  string $key
     * @param  mixed $default
     * @return mixed
     */
    function ref($key = null, $default = null)
    {
        if (is_null($key)) {
            return null;
        }
        $asset_alias = config('site.asset.alias');

        return isset($asset_alias[$key]) ? $asset_alias[$key]: $default;
    }

}

if (!function_exists('cache')) {

    /**
     * cache helper
     *
     * @param  string $key
     * @param  mixed $default
     * @return mixed
     */
    function cache($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('cache');
        }

        return app('cache')->get($key, $default);
    }
}

if (!function_exists('deny')) {

    /**
     * 40X deny helper
     * only for 401 Unauthorized, 403 Forbidden and 404 Not Found errors
     *
     * @param  string $site site alias name
     * @param 
     * @return \Response
     */
    function deny($site = 'admin', $status = 403)
    {
        if (!in_array($status, [401, 403, 404])) {
            return $status = 403;
        }
        switch ($site) {
            case 'admin':
                return response()->view('admin.errors.'.$status, [], $status);
                break;
            case 'desktop':
                return reponse()->view('desktop.errors.'.$status, [], $status);
                break;
            case 'mobile':
                return reponse()->view('mobile.errors.'.$status, [], $status);
                break;
            default:
                return response()->view('errors.'.$status, [], $status);
                break;
        }
    }
}


/*
# ----------------------------------------
# 以下从原有旧版 YASCMF 里面弄过来的 START
# ----------------------------------------
*/

/**
 * 格式化表单校验消息
 *
 * @param array $messages 未格式化之前数组
 * @return string 格式化之后字符串
 */
function format_message($messages)
{
    $reason = ' ';
    foreach ($messages->all('<span class="text_error">:message</span>') as $message) {
        $reason .= $message.' ';
    }
    return $reason;
}

/**
 * 格式化表单校验消息，并进行json数组化预处理
 *
 * @param array $messages 未格式化之前数组
 * @param array $json 原始json数组数据
 * @return array
 */
function format_json_message($messages, $json)
{
    $reason = format_message($messages);
    $info = '失败原因为：'.$reason;
    $json = array_replace($json, ['info' => $info]);
    return $json;
}

/**
 * 文章推荐位 flag html标签化
 * 
 * @param string $flag_str
 * @param array $flags
 * @return string
 */
function flag_tag($flag_str, $flags)
{
    if (empty($flag_str)) {
        return '';
    } else {
        $flags_array = explode(',', rtrim($flag_str, ','));
        $str = '';
        foreach ($flags_array as $flag)
        {
            $str .= '<span class="label label-danger article-flag" title="'.$flags[$flag].'" data-toggle="tooltip" data-placement="bottom">'.$flag.'</span>  ';
        }
        return $str;
    }
}

/**
 * 中文摘要算法
 *
 * @param string $content 正文
 * @return string
 */
function chinese_excerpt($content)
{
    return mb_strimwidth(strip_tags($content), 0, 200, '...');
}

/**
 * 芽丝CMF后台分页helper
 *
 * @param Illuminate\Support\Collection $model
 * @param array $data 追加的参数数组
 * @return string 返回分页
 */
function page_links($model, $data = [])
{
    $presenter = new \Douyasi\Extensions\DouyasiPresenter($model);
    if (empty($data)) {
        $links = $model->render($presenter);
    } else {
        $links = $model->appends($data)->render($presenter);
    }
    return $links;
}

/**
 * 检查 特定数组 特定键名的键值 是否与待比较的值一致
 * 此helper主要用于角色权限特征判断
 *
 * @param array $array 传入的数组
 * @param string $key 待比较的数组键名
 * @param string $value 待比较的值
 * @return boolean 一致则返回true，否则返回false
 */
function check_array($array, $key, $value)
{
    $status = false;

    foreach ($array as $arr) {
        if ($arr[$key] === $value) {
            $status = true;
            break;
        } else {
            continue;
        }
    }

    return $status;
}

/**
 * 检查 特殊字符串（如逗号分隔值字符串） 是否与待比较的值一致
 * 此helper主要用于文章推荐位特征判断
 *
 * @param string $string 逗号分隔值字符串
 * @param string $value 待比较的值
 * @return boolean 一致则返回true，否则返回false
 */
function check_string($string, $value)
{
    $status = false;
    $csv_array = explode(',', rtrim($string, ','));  //逗号分割值字符串转成数组

    foreach ($csv_array as $csv)
    {
        if ($csv === $value) {
            $status = true;
            break;
        } else {
            continue;
        }
    }

    return $status;
}


/**
 * 检查$url1字符串开头是否包含$url2字符串
 *
 * @param string $url1 URL字符串
 * @param string $url2 待比较的URL子字符串
 * @return boolean 符合要求则返回true，否则返回false
 */
function check_url($url1, $url2)
{
    $url1 = strtolower(trim($url1));
    $url1 = ltrim($url1, 'https:');
    $url1 = ltrim($url1, 'http:');
    $url2 = strtolower(trim($url2));
    $url2 = ltrim($url2, 'https:');
    $url2 = ltrim($url2, 'http:');
    $url2 = rtrim($url2, '/');

    return starts_with($url1, $url2);
}

/*
# ----------------------------------------
# 以下从原有旧版 YASCMF 里面弄过来的 END
# ----------------------------------------
*/
