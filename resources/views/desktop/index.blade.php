<!DOCTYPE html>
<html lang="{{ trans('yascmf.lang_code') }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ trans('yascmf.description') }}">
    <meta name="author" content="{{ trans('yascmf.author_url') }}">

    <title>{{ trans('yascmf.framework_name') }} - {{ trans('yascmf.alias') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ _asset(ref('bootstrap.css')) }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ _asset('assets/css/landing-page.css') }}" rel="stylesheet">

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

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
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
                    <li>
                        <a href="#intro">{{ trans('yascmf.top_nav.intro') }}</a>
                    </li>
                    <li>
                        <a href="#feature">{{ trans('yascmf.top_nav.feature') }}</a>
                    </li>
                    <li>
                        <a href="#contact">{{ trans('yascmf.top_nav.contact') }}</a>
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


    <!-- Header -->
    <a name="intro"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>YASCMF</h1>
                        <h3>{!! trans('yascmf.intro.text') !!}</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="/docs/demo.md" class="btn btn-default btn-lg"><i class="fa fa-eye fa-fw"></i> <span class="network-name">{{ trans('yascmf.intro.preview') }}</span></a>
                            </li>
                            <li>
                                <a href="https://github.com/yascmf/base" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">{{ trans('yascmf.intro.source') }}</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="btn btn-default btn-lg layer_open" data-title="{{ trans('yascmf.intro.donation') }}"><i class="fa fa-rmb fa-fw"></i> <span class="network-name">{{ trans('yascmf.intro.donation') }}</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

    <a  name="feature"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">{!! trans('yascmf.feature.thanks.heading') !!}</h2>
                    <p class="lead">{!! trans('yascmf.feature.thanks.paragraph') !!}</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="{{ _asset('assets/img/ipad.png') }}" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">{!! trans('yascmf.feature.advantages.heading') !!}</h2>
                    <p class="lead">{!! trans('yascmf.feature.advantages.paragraph') !!}</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="{{ _asset('assets/img/dog.png') }}" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">{!! trans('yascmf.feature.ui.heading') !!}</h2>
                    <p class="lead">{!! trans('yascmf.feature.ui.paragraph') !!}</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="{{ _asset('assets/img/phones.png') }}" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <a  name="contact"></a>
    <div class="banner">
        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2>{{ trans('yascmf.social_contact.text') }}</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="{{ trans('yascmf.social_contact.twitter.url') }}" class="btn btn-default btn-lg" alt="Twitter" title="Twitter"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="{{ trans('yascmf.social_contact.github.url') }}" class="btn btn-default btn-lg" alt="Github" title="Github"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                        </li>
                        <li>
                            <a href="{{ trans('yascmf.social_contact.weibo.url') }}" class="btn btn-default btn-lg" alt="{{ trans('yascmf.social_contact.weibo.text') }}" title="{{ trans('yascmf.social_contact.weibo.text') }}"><i class="fa fa-weibo fa-fw"></i> <span class="network-name">{{ trans('yascmf.social_contact.weibo.text') }}</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->

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

    <script src="{{ _asset(ref('layer.js')) }}"></script>

    <script type="text/javascript">
$(document).ready(function(){

    $('a.layer_open').on('click', function() {
        var title = $(this).data('title');
        var content = '<div class="layer_content">{!! trans('yascmf.intro.qr_text') !!}</div>';
        layer.open({
          type: 1,
          title: title,
          skin: 'layui-layer-rim',
          area: [ '685px', '635px'],
          content: content
        });
    });

});
    </script>

</body>

</html>
