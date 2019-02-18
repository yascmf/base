@extends('admin.layout._back')

@section('content-header')
    @parent
    <h1>
        内容管理
        <small>标签</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ site_url('dashboard', 'admin') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">内容管理 - 标签</li>
    </ol>
@stop

@section('content')

    @if(session()->has('fail'))
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon icon fa fa-warning"></i> 提示！</h4>
            {{ session('fail') }}
        </div>
    @endif

    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> 提示！</h4>
            {{ session('message') }}
        </div>
    @endif

    <a href="{{ _route('admin:tag.create') }}" class="btn btn-primary margin-bottom">新增Tag</a>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">分类列表</h3>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
            <table class="table table-hover table-bordered">
                <tbody>
                <!--tr-th start-->
                <tr>
                    <th>操作</th>
                    <th>编号</th>
                    <th>名称</th>
                    <th>类别</th>
                    <th>描述</th>
                    <th>更新时间</th>
                </tr>
                <!--tr-th end-->

                @foreach ($tags as $tag)
                    <tr>
                        <td>
                            @can('category-write')
                                <a href="{{ _route('admin:tag.edit', $tag->id) }}"><i class="fa fa-fw fa-pencil"
                                                                                           title="修改"></i></a>
                            @endcan
                            @can('category-show')
                                <a href="{{ _route('admin:article.index', ['s_tid' => $tag->id]) }}"><i
                                            class="fa fa-fw fa-link" title="查看该tag下文章"></i></a>
                            @endcan
                        </td>
                        <td>{{ $tag->id }}</td>
                        <td class="text-muted">
                            {{ $tag->name }}
                        </td>
                        <td class="text-green">
                            @if(empty(config('ecms.tag.type')[$tag->type]))
                                -
                            @else
                                {{ config('ecms.tag.type')[$tag->type] }}
                            @endif
                        </td>
                        <td>{{ $tag->descript }}</td>
                        <td>{{ $tag->updated_at }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div><!-- /.box-body -->
        <div class="box-footer clearfix">
            {!! $tags->render() !!}
        </div>

    </div>
@stop



