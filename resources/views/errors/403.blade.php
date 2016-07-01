<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>YASCMF - YAS Content Management Framework</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link href="{{ _asset(ref('bootstrap.css')) }}" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="{{ _asset(ref('html5shiv.js')) }}"></script>
            <script src="{{ _asset(ref('respond.js')) }}"></script>
        <![endif]-->
        <style>
        body{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;font-family:'Source Sans Pro','Helvetica Neue',Helvetica,Arial,'\5FAE\8F6F\96C5\9ED1','Hiragino Sans GB',sans-serif;font-weight:400;overflow-x:hidden;overflow-y:auto}.wrapper:after,.wrapper:before{content:" ";display:table}.wrapper:after{clear:both}.wrapper{min-height:100%;position:relative;overflow:hidden!important}.content-header{position:relative;padding:15px 15px 0 15px}.content-header>h1{margin:0;font-size:24px}.content-header>h1>small{font-size:15px;display:inline-block;padding-left:4px;font-weight:300}.content-wrapper,.right-side{min-height:100%;background-color:#ecf0f5;z-index:800}.callout.callout-danger{color:#fff!important;border-color:#c23321;background-color:#dd4b39!important}.h1,.h2,.h3,.h4,.h5,.h6,h1,h2,h3,h4,h5,h6{font-family:'Source Sans Pro','\5FAE\8F6F\96C5\9ED1','Hiragino Sans GB',sans-serif}.callout h4{margin-top:0;font-weight:600}.callout p a{color:#fcff00}.callout p:last-child{margin-bottom:0}.callout{border-radius:3px;margin:0 0 20px 0;padding:15px 30px 15px 15px;border-left:5px solid #eee}.main-footer{background:#fff;padding:15px;color:#444;border-top:1px solid #d2d6de}a{color:#3c8dbc}.content{min-height:250px;padding:15px;margin-right:auto;margin-left:auto;padding-left:15px;padding-right:15px}
        </style>
    </head>

    <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
    <body class="hold-transition skin-blue layout-top-nav">
        <div class="wrapper">
            <!-- Full Width Column -->
            <div class="content-wrapper">
                <div class="container">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                          芽丝内容管理框架
                          <small>YASCMF</small>
                        </h1>
                    </section>

                    <!-- Main content -->
                    <section class="content">
                        <div class="callout callout-danger">
                            <h4>异常警告：403错误 权限不足</h4>
                            <p>您没有权限访问当前页面，请联系超级管理员或者访问其它页面节点！</p>
                            <p><a href="/">&gt;&gt;&gt;点此快速跳转回首页&lt;&lt;&lt;</a></p>
                        </div>
                    </section><!-- /.content -->
                </div><!-- /.container -->
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="container">
                    <div class="pull-right hidden-xs">
                        <b>版本:</b> v5.2.1
                    </div>
                    <strong>Copyright &copy; 2011-{{ date('Y') }}  <a href="http://www.yascmf.com/">{{ trans('yascmf.full_name') }}</a></strong>  ( <code>{{ yascmf_version() }}</code> )
                </div><!-- /.container -->
            </footer>
        </div><!-- ./wrapper -->
    </body>
</html>
