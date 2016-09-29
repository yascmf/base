
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $md_doc_title }} - YASCMF官方文档</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="YASCMF官方文档">
    <meta name="author" content="http://douyasi.com">
    <link href="/vendor/mdoc/css/bootstrap_mdv.css" rel="stylesheet">
    <link href="/vendor/mdoc/css/github-markdown.css" rel="stylesheet">
    <script src="{{ _asset(ref('highlight.js')) }}"></script>
    <link href="{{ _asset(ref('hl_github.css')) }}" rel="stylesheet">
    <script src="{{ _asset(ref('jquery.js')) }}"></script>
    <style type="text/css">
    body{margin:5px auto;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Helvetica,"Hiragino Sans GB","\5FAE\8F6F\96C5\9ED1",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";-webkit-font-smoothing:antialiased}strong{font-weight:700}.docs-nav{padding:10px 0 10px 10px}.docs-nav ul{list-style-type:none;list-style-position:inside}.docs-nav ul li{line-height:24px;color:#999}.docs-nav ul li>a{color:#999;text-decoration:none}.docs-nav ul li.active a,.docs-nav ul li>a:hover{color:#000}pre{font-family:'Courier New',Courier,monospace}.markdown-body{margin-bottom:50px!important}p.copyright{margin:15px 0}p.copyright a{color:#4183C4;text-decoration:none}.footer{text-align:center}
    </style>
</head>
<body>
    <div class="docs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-sm-6">
                    <article class="markdown-body" id="content">
                        <!-- md_doc_body -->
                        {!! $md_doc_body !!}
                    </article>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-6">
                    <div class="docs-nav bg-info">
                        <h3>目录</h3>
                        <section id="sider-menu">
                            <!-- md_doc_nav -->
                            {!! $md_doc_nav !!}
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright text-muted small"><a href="http://www.yascmf.com">YASCMF</a> 版权所有， ICP : <a href="http://www.miibeian.gov.cn/">{{ cache('website_icp', '鄂ICP备15014910号-3') }}</a></p>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
hljs.initHighlightingOnLoad();
$(document).ready(function () {
    var path_array = window.location.pathname.split( '/' );
    var doc = path_array[path_array.length-1];
    $('div.sider li').find('a[href="'+doc+'"]').closest('li').addClass('active');  //高亮
});
</script>
</body>
</html>
