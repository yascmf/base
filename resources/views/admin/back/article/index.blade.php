@extends('admin.layout._back')

@section('content-header')
@parent
          <h1>
            内容管理
            <small>文章</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ site_url('dashboard', 'admin') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
            <li class="active">内容管理 - 文章</li>
          </ol>
@stop

@section('content')

              @if(session()->has('message'))
                <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4>  <i class="icon fa fa-check"></i> 提示！</h4>
                  {{ session('message') }}
                </div>
              @endif

              <a href="{{ _route('admin:article.create') }}" class="btn btn-primary margin-bottom">撰写新文章</a>

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">文章列表</h3>
                  @can('article-search')
                  <div class="box-tools">
                    <form action="{{ _route('admin:article.index') }}" method="get">
                      <div class="input-group">
                        <input type="text" class="form-control input-sm pull-right" name="s_title" value="{{ request('s_title') }}" style="width: 150px;" placeholder="搜索文章标题">
                        <div class="input-group-btn">
                          <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                  @endcan
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table class="table table-hover table-bordered">
                    <tbody>
                      <!--tr-th start-->
                      <tr>
                        <th>操作</th>
                        <th>推荐位</th>
                        <th>标题</th>
                        <th>slug</th>
                        <th>缩略图</th>
                        <th>分类</th>
                        <th>更新时间</th>
                      </tr>
                      <!--tr-th end-->

                      @foreach ($articles as $art)
                      <tr>
                        <td>
                            @can('article-write')
                            <a href="{{ _route('admin:article.edit', $art->id) }}"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                            @endcan
                            <a href="javascript:void(0);"><i class="fa fa-fw fa-link" title="预览"></i></a>
                        </td>
                        <td class="text-green">{!! flag_tag($art->flag, $flags) !!}</td>
                        <td class="text-muted" title="{{ $art->title }}">{{ str_limit($art->title, 36) }}</td>
                        <td title="//example.org/{category}/{{ $art->slug }}.html"><span class="text-red">{{ str_limit($art->slug, 16) }}</span></td>
                        <td class="text-green">
                          @if(empty($art->thumb))
                              -
                          @else
                              <a href="{{ $art->thumb }}" class="layer_open">{{ str_limit($art->thumb, 30) }}</a>
                          @endif
                        </td>
                        <td class="text-red"><a href="{{ _route('admin:article.index', ['s_cid' => $art->cid] ) }}">{{ $art->category->name }}</a></td>
                        <td>{{ $art->updated_at }}</td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  {!! $articles->appends([
                                          's_cid' => request('s_cid'),
                                          's_title' => request('s_title'),
                                        ])->render() !!}
                </div>

              </div>
@stop

@section('extraPlugin')
  <!--引入layer插件-->
  <script src="{{ _asset(ref('layer.js')) }}"></script>
@stop

@section('filledScript')

        $('a.layer_open').on('click', function(evt){
            evt.preventDefault();
            var src = $(this).attr("href");
            var title = $(this).data('title');
            var width = $(window).width();
            if(width > 1080) {
                width = 1080
            } else {
                width = 980;
            }
            layer.open({
                type: 2,
                title: title,
                shadeClose: false,
                shade: 0.8,
                area: [ width+'px', '90%'],
                content: src //iframe的url
            });
        });

@stop
