@extends('admin.layout._back')

@section('content-header')
@parent
          <h1>
            系统管理
            <small>系统日志</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ site_url('dashboard', 'admin') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
            <li class="active">系统管理 - 系统日志</li>
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

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">日志列表</h3>
                  @can('log-search')
                  <div class="box-tools">
                    <form action="{{ _route('admin:log.index') }}" method="get" class="form-inline">

                      <div class="form-group">
                        <select data-placeholder="选择类型 ..." class="form-control input-sm chosen-select" name="type">
                          <option value="">选择类型</option>
                        @foreach (dict('log_type') as $k => $v)
                          <option value="{{ $k }}" {{ (request('type') == $k) ? 'selected' : '' }}>{{ $v }}</option>
                        @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <input type="text" class="form-control input-sm pull-right" name="s_operator_realname" value="{{ request('s_operator_realname') }}" style="width: 150px;" placeholder="搜索操作者真实姓名">
                      </div>

                      <div class="form-group">
                        <input type="text" class="form-control input-sm pull-right" name="s_operator_ip" value="{{ request('s_operator_ip') }}" style="width: 150px;" placeholder="搜索操作者IP">
                      </div>

                      <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>

                    </form>
                  </div>
                  @endcan
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <div class="tablebox-controls">
                    <button class="btn btn-default btn-sm"><i class="fa fa-file-excel-o" title="导出为excel文件"></i></button>
                    <button class="btn btn-default btn-sm"><i class="fa fa-file-text-o" title="导出为log文本文件"></i></button>                  </div>
                  <table class="table table-hover table-bordered">
                    <tbody>
                      <!--tr-th start-->
                      <tr>
                        <th>查阅</th>
                        <th>类型</th>
                        <th>操作者</th>
                        <th>操作者IP</th>
                        <th>操作URL</th>
                        <th>操作内容</th>
                        <th>操作时间</th>
                      </tr>
                      <!--tr-th end-->

                      @foreach ($system_logs as $sys_log)
                      <tr>
                        <td>
                            @can('log-show')
                            <a href="{{ _route('admin:log.show', $sys_log->id) }}" class="layer_open" data-title="查看" data-width="400"><i class="fa fa-fw fa-link" title="查看"></i></a>
                            @endcan
                        </td>
                        <td class="text-red">{{ dict('log_type.'.$sys_log->type) }}</td>
                        <td class="text-green">{{ $sys_log->username or '--' }} / {{ $sys_log->realname or '--' }}</td>
                        <td class="text-yellow">{{ $sys_log->operator_ip }}</td>
                        <td class="overflow-hidden" title="{{ $sys_log->url }}">{{ $sys_log->url }}</td>
                         <td class="overflow-hidden" title="{{ $sys_log->content }}">{{ str_limit($sys_log->content, 70, '...') }}</td>
                        <td>{{ $sys_log->created_at }}</td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  {!! $system_logs->appends([
                        'type' => request('type'),
                        's_operator_realname' => request('s_operator_realname'),
                        's_operator_ip' => request('s_operator_ip'),
                      ])->render(); !!}
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
            var that = this;
            var src = $(this).attr("href");
            var title = $(this).data('title');
            layer.tips('这是你当前查看的日志', that);
            layer.open({
                type: 2,
                title: title,
                shadeClose: false,
                shade: 0,
                area: ['600px', '360px'],
                content: src //iframe的url
            });
        });

@stop
