

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="YASCMF官方文档">
    <meta name="author" content="http://douyasi.com">

    <title>{{ $md_doc_title }} - YASCMF官方文档</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ _asset(ref('bootstrap.css')) }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ _asset('assets/css/landing-page.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ _asset('vendor/mdoc/css/style.min.css') }}">

    <!-- Custom Fonts -->
    <link href="{{ _asset(ref('font-awesome.css')) }}" rel="stylesheet" type="text/css">
    <link href="{{ _asset('assets/Lato_300,400,700,300italic,400italic,700italic.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="{{ _asset(ref('html5shiv.js')) }}"></script>
        <script src="{{ _asset(ref('respond.js')) }}"></script>
    <![endif]-->

</head>

<body class="md-doc">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle toggle-sidebar" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="http://www.yascmf.com">YASCMF</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="http://www.yascmf.com/docs/index">{{ trans('yascmf.bottom_nav.doc') }}</a>
                    </li>
                    <li>
                        <a href="http://www.yascmf.com/blog">{{ trans('yascmf.bottom_nav.blog') }}</a>
                    </li>
                    <li>
                        <a href="http://shang.qq.com/wpa/qunwpa?idkey=c43a551e4bc0ff5c5051ec8f6d901ab21c1e89e3001d6cf0b0b4a28c0fa4d4f8" alt="云应用网络开发交流群：260655062" title="云应用网络开发交流群：260655062">{{ trans('yascmf.bottom_nav.qq_group') }}</a>
                    </li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-globe"></i>  {{ trans('yascmf.lang.text') }}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ _route('desktop:lang?lng=zh-CN') }}">{{ trans('yascmf.lang.zh-CN') }}</a></li>
                          <li><a href="{{ _route('desktop:lang?lng=en') }}">{{ trans('yascmf.lang.en') }}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <div class="docs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-sm-6">
                    <article>
                        {!! $md_doc_body !!}
                    </article>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-6">
                    <div class="docs-nav bg-info">
                        <h3>目录</h3>
                        <section>
                            {!! $md_doc_nav !!}
                        </section>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="http://www.yascmf.com">{{ trans('yascmf.bottom_nav.home') }}</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="http://www.yascmf.com/docs/index">{{ trans('yascmf.bottom_nav.doc') }}</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="http://www.yascmf.com/blog">{{ trans('yascmf.bottom_nav.blog') }}</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="https://github.com/yascmf/base">{{ trans('yascmf.bottom_nav.source') }}</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="http://shang.qq.com/wpa/qunwpa?idkey=c43a551e4bc0ff5c5051ec8f6d901ab21c1e89e3001d6cf0b0b4a28c0fa4d4f8" alt="云应用网络开发交流群：260655062" title="云应用网络开发交流群：260655062">{{ trans('yascmf.bottom_nav.qq_group') }}</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">{!! trans('yascmf.copyright_text', ['yas' => trans('yascmf.yas'), 'yas_url' => trans('yascmf.yas_url')]) !!}  ICP : <a href="http://www.miibeian.gov.cn/">{{ cache('website_icp', '鄂ICP备15014910号-3') }}</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="{{ _asset(ref('jquery.js')) }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ _asset(ref('bootstrap.js')) }}"></script>

    <script src="{{ _asset('lib/highlight.js/highlight.pack.js?v=9.6.0') }}"></script>
    <link href="{{ _asset('lib/highlight.js/styles/monokai-sublime.css?v=9.6.0') }}" rel="stylesheet">
    <script >hljs.initHighlightingOnLoad();</script>

    <script type="text/javascript">
$(document).ready(function () {
    var path_array = window.location.pathname.split( '/' );
    var doc = path_array[path_array.length-1];
    $('div.sider li').find('a[href="'+doc+'"]').closest('li').addClass('active');  //高亮
});
    </script>

</body>

</html>

