<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesAndArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = date('Y-m-d H:i:s');

        // 生成默认分类
        $categoryId = DB::table('categories')->insertGetId([
            'name' => '默认',
            'slug' => 'default',
            'created_at' => $time,
            'updated_at' => $time,
        ]);

        // 生成示例文章
        DB::table('articles')->insert([
            [
                'title' => '你好，世界！',
                'flag' => '',
                'thumb' => '',
                'slug' => 'hello_world',
                'cid' => $categoryId,
                'description' => '你好，世界！'.PHP_EOL.'芽丝CMF，欢迎您的使用！',
                'content' => '你好，世界！'.PHP_EOL.''.PHP_EOL.'芽丝轻博客，基于 [`YASCMF`](http://www.yascmf.com) 构建，欢迎您的使用！',
                'created_at' => '2015-01-23 15:54:54',
                'updated_at' => '2015-01-23 15:54:54',
            ],
            [
                'title' => '诗歌三首',
                'flag' => '',
                'thumb' => '',
                'slug' => 'poetry',
                'cid' => $categoryId,
                'description' => '以下摘录均为古诗歌，仅供轻博客演示使用。',
                'content' => '> 以下摘录均为古诗歌，仅供轻博客演示使用。'.PHP_EOL.''.PHP_EOL.''.PHP_EOL.'**菩提偈（其三）**'.PHP_EOL.''.PHP_EOL.'*[唐]慧能*'.PHP_EOL.''.PHP_EOL.'菩提本无树，'.PHP_EOL.'明镜亦非台。'.PHP_EOL.'本来无一物，'.PHP_EOL.'何处惹尘埃。'.PHP_EOL.''.PHP_EOL.'**离思**'.PHP_EOL.''.PHP_EOL.'*[唐]元稹*'.PHP_EOL.''.PHP_EOL.'曾经沧海难为水，'.PHP_EOL.'除却巫山不是云。'.PHP_EOL.'取次花丛懒回顾，'.PHP_EOL.'半缘修道半缘君。'.PHP_EOL.''.PHP_EOL.'**国风·周南·关雎**'.PHP_EOL.''.PHP_EOL.'*[周]无名氏*'.PHP_EOL.''.PHP_EOL.'关关雎鸠，在河之洲。'.PHP_EOL.'窈窕淑女，君子好逑。'.PHP_EOL.'参差荇菜，左右流之。'.PHP_EOL.'窈窕淑女，寤寐求之。'.PHP_EOL.'求之不得，寤寐思服。'.PHP_EOL.'悠哉悠哉，辗转反侧。'.PHP_EOL.'参差荇菜，左右采之。'.PHP_EOL.'窈窕淑女，琴瑟友之。'.PHP_EOL.'参差荇菜，左右芼之。'.PHP_EOL.'窈窕淑女，钟鼓乐之。'.PHP_EOL.'',
                'created_at' => '2016-12-28 14:26:04',
                'updated_at' => '2016-12-28 14:26:04',
            ],
            [
                'title' => '使用mac一个月之后感想',
                'flag' => '',
                'thumb' => '',
                'slug' => 'using_mac',
                'cid' => $categoryId,
                'description' => '使用新版 `macbook pro` 已一月有余，说说使用感想。',
                'content' => '>	本文原载于[豆芽丝博客](http://douyasi.com/mac/using_mac.html \"豆芽丝博客\")，在此仅供演示使用。'.PHP_EOL.''.PHP_EOL.'使用新版 `macbook pro` 已一月有余，说说使用感想。'.PHP_EOL.''.PHP_EOL.'1. 新版，带 `bar`，实用性并不是很足，我一般就是调整亮度和声音以及使用 `esc` 按键时用到。新款性价比不高，如果经济条件不允许，建议继续买旧版。'.PHP_EOL.''.PHP_EOL.'2. 配置php相关运行环境折腾了不少时间，安装 `nginx` 和 `mysql` 建议使用 `homebrew` 套件，强烈建议开发还是使用 `homestead` 环境，可以节省不少时间。毕竟你的源码最终还是得运行在 `linux` 环境下而不是 `mac`。'.PHP_EOL.''.PHP_EOL.'3. mac系统下，可以接触和使用到不少优秀软件，这些都是 `Windows` 系统下没有的，而且由于苹果系统的封闭性，极少有恶意、广告漫天飞的软件，再也不用担心 `BAT` “全家桶”了。'.PHP_EOL.''.PHP_EOL.'4. 作为码农，使用 `mac` 不是为了装逼，而是为了提高生产力，更好更专注地学习与使用新技术。想想层出不穷的前后端各种工具，类 `unix` 系统的 `iOS` 有着天然的优势。'.PHP_EOL.''.PHP_EOL.'5. mac系统优秀，设计前瞻：高清视网膜屏幕，让你不再留恋 `windows` 下渣画质；资源占用少、节电待机续航时间长，快速休眠与恢复等等。'.PHP_EOL.''.PHP_EOL.'附带，目前已安装的一些软件。'.PHP_EOL.''.PHP_EOL.'```'.PHP_EOL.'zsh'.PHP_EOL.'Xcode'.PHP_EOL.'Sublime'.PHP_EOL.'Chrome'.PHP_EOL.'坚果云'.PHP_EOL.'Postman'.PHP_EOL.'Charles'.PHP_EOL.'iTerm'.PHP_EOL.'Homebrew'.PHP_EOL.'Vagrant'.PHP_EOL.'VirtualBox'.PHP_EOL.'Bear'.PHP_EOL.'XMid'.PHP_EOL.'Afred'.PHP_EOL.'ShadowsocksX'.PHP_EOL.'......'.PHP_EOL.'```',
                'created_at' => '2016-12-28 14:34:17',
                'updated_at' => '2016-12-28 14:34:17',
            ],
            [
                'title' => 'editor.md for Laravel',
                'flag' => '',
                'thumb' => '',
                'slug' => 'laravel_editor_md',
                'cid' => $categoryId,
                'description' => '`editor.md` 是一款高度可定制化的 `markdown` 编辑器，官方网站：https://pandao.github.io/editor.md/ 。',
                'content' => '> 本文来自 [laravel-editor-md](https://github.com/douyasi/laravel-editor-md) readme文件，仅供演示使用。'.PHP_EOL.''.PHP_EOL.'>  `editor.md` 是一款高度可定制化的 `markdown` 编辑器，官方网站：https://pandao.github.io/editor.md/ 。'.PHP_EOL.''.PHP_EOL.'## 兼容版本'.PHP_EOL.''.PHP_EOL.'本扩展包经过测试，适配 `Laravel 5.1` 以上稳定版本（`5.0` 版本理论上也是可行的，但未经测试）。'.PHP_EOL.''.PHP_EOL.'>   特别说明：'.PHP_EOL.'>   `composer` 分析某些依赖时可能会出现问题：比如在 `Laravel 5.2` 主项目中，安装本扩展包，可能会装上 `5.3` 版本的 `illuminate/support` 与 `illuminate/contracts` 相关依赖包，这样可能会造成 `5.2` 主项目出现错误。为此，本包在 `composer.json` 特别移除对 `\"illuminate/support\": \"~5.1\"` 的依赖。'.PHP_EOL.''.PHP_EOL.'## 安装与配置'.PHP_EOL.''.PHP_EOL.'在 `composer.json` 新增 `\"douyasi/laravel-editor-md\": \"dev-master\"` 依赖，然后执行： `composer update` 操作。'.PHP_EOL.''.PHP_EOL.'依赖安装完毕之后，在 `app.php` 中添加：'.PHP_EOL.''.PHP_EOL.'```php'.PHP_EOL.'\'providers\' => ['.PHP_EOL.'        \'Douyasi\\Editor\\EditorServiceProvider\','.PHP_EOL.'],'.PHP_EOL.'```'.PHP_EOL.''.PHP_EOL.'然后，执行下面 `artisan` 命令，发布该扩展包配置等项。'.PHP_EOL.''.PHP_EOL.'```bash'.PHP_EOL.'php artisan vendor:publish --force'.PHP_EOL.'```'.PHP_EOL.''.PHP_EOL.'现在您可以访问 `/laravel-editor-md/example` 路由，不出意外，您可以看到扩展包提供的示例页面。'.PHP_EOL.''.PHP_EOL.'![](http://douyasi.com/usr/uploads/2016/08/2512199115.jpg)'.PHP_EOL.''.PHP_EOL.'编辑器图片默认会上传到 `public/uploads/content` 目录下；编辑器相关功能配置位于 `config/editor.php` 文件中。'.PHP_EOL.''.PHP_EOL.'## 使用说明'.PHP_EOL.''.PHP_EOL.'在 `blade` 模版里面使用下面三个方法：`editor_css()` 、`editor_js()` 和 `editor_config()` 。'.PHP_EOL.''.PHP_EOL.'```html'.PHP_EOL.'<!DOCTYPE html>'.PHP_EOL.'<html lang=\"en\">'.PHP_EOL.'<head>'.PHP_EOL.'    <meta charset=\"UTF-8\">'.PHP_EOL.'    <title>editor.md example</title>'.PHP_EOL.'    {!! editor_css() !!}'.PHP_EOL.'</head>'.PHP_EOL.'<body>'.PHP_EOL.'<h2>editor.md example</h2>'.PHP_EOL.'<div id=\"mdeditor\">'.PHP_EOL.'  <textarea class=\"form-control\" name=\"content\" style=\"display:none;\">'.PHP_EOL.'# editor.md for Laravel'.PHP_EOL.'>   editor.md example'.PHP_EOL.'  </textarea>'.PHP_EOL.'</div>'.PHP_EOL.''.PHP_EOL.'{!! editor_js() !!}'.PHP_EOL.'{!! editor_config(\'mdeditor\') !!}'.PHP_EOL.'</body>'.PHP_EOL.'</html>'.PHP_EOL.'```',
                'created_at' => '2016-12-28 14:37:40',
                'updated_at' => '2016-12-28 14:37:40',
            ],
        ]);
    }
}
