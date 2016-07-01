<!DOCTYPE html>
<html>
    <head>
        <title>YASCMF/BASE - Powered by Laravel</title>

        <!-- <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css"> -->
        <link href="{{ _asset('lib/Lato_100.css') }}" rel="stylesheet" type="text/css">
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }

            a {
                color: #fff;
                text-decoration: none;
            }

            a:hover {
                text-decoration: underline;
                background: #333;
            }
            .paragraph {
                padding: 5px;
                color: #ff0;
                background: #000;
            }

            .lang_chs {
                font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, 'Hiragino Sans GB', '\5FAE\8F6F\96C5\9ED1', sans-serif;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">YASCMF</div>
            </div>
            <div class="paragraph">
                    <h3>站点分布</h3>
                    <p>
                        <a href="{{ env('DOC_SITE', '//yascmf.dev').'/'.config('site.route.prefix.doc') }}" target="_blank">文档</a>  |  
                        <a href="{{ env('ADMIN_SITE', '//yascmf.dev').'/'.config('site.route.prefix.admin') }}">管理后台</a>  |  
                        <a href="{{ env('DESKTOP_SITE').'/'.config('site.route.prefix.desktop') }}">桌面(前台)</a>  |  
                        <a href="{{ env('MOBILE_SITE', '//yascmf.dev').'/'.config('site.route.prefix.mobile') }}">移动(前台)</a>
                    </p>
            </div>
        </div>
    </body>
</html>
