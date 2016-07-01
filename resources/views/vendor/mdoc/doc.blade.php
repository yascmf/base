<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>{{ $md_doc_title }}</title>
    <link rel="stylesheet" href="{{ _asset('vendor/mdoc/css/style.min.css') }}">
    <script src="{{ _asset('vendor/mdoc/lib/highlight.js/highlight.pack.js?v=8.6') }}"></script>
    <script src="{{ _asset('vendor/mdoc/lib/jquery/jquery.min.js?v=1.8.3') }}"></script>
    <link href="{{ _asset('vendor/mdoc/lib/highlight.js/styles/monokai_sublime.css?v=8.6') }}" rel="stylesheet"> 
    <script >hljs.initHighlightingOnLoad();</script>
</head>
<body class="md-doc">


<div class="docs-nav">

        {!! $md_doc_nav !!}

</div>

<div class="docs-con">

{!! $md_doc_body !!}

</div>

<script type="text/javascript">
$(document).ready(function(){
var path_array = window.location.pathname.split( '/' );
var doc = path_array[path_array.length-1];
$('div.sider li').find('a[href="'+doc+'"]').closest('li').addClass('active');  //高亮
});
</script>

</body>
</html>
