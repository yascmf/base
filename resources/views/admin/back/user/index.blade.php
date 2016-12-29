@extends('admin.layout._back')

@section('content-header')
@parent
          <h1>
            用户管理
            <small>管理员</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ site_url('dashboard', 'admin') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
            <li class="active">用户管理 - 管理员</li>
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

              @can('user-write')
              <a href="{{ _route('admin:user.create') }}" class="btn btn-primary margin-bottom">新增管理员(用户)</a>
              @endcan

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">管理员列表</h3>
                  @can('user-search')
                  <div class="box-tools">
                    <form action="{{ _route('admin:user.index') }}" method="get" class="form-inline">
                      <div class="form-group">
                        <input type="text" class="form-control input-sm" name="s_name" value="{{ request('s_name') }}" style="width: 200px;" placeholder="搜索用户登录名或昵称或真实姓名">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control input-sm" name="s_phone" value="{{ request('s_phone') }}" style="width: 150px;" placeholder="搜索用户手机号">
                      </div>
                      <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
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
                        <th>编号</th>
                        <th>登录名 / 昵称</th>
                        <th>真实姓名</th>
                        <th>角色</th>
                        <th>状态</th>
                        <th>最后一次登录时间</th>
                      </tr>
                      <!--tr-th end-->
                      @foreach ($users as $user)
                      <tr>
                        <td>
                          @can('user-write')
                          <a href="{{ _route('admin:user.edit', $user->id) }}"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                          @endcan
                        </td>
                        <td>{{ $user->id }}</td>
                        <td class="text-muted">{{ $user->username }} / {{ $user->nickname }}</td>
                        <td class="text-green">
                          {{ $user->realname }}
                        </td>
                        <td class="text-red">
                          @if(null !== $user->roles->first())  {{-- 某些错误情况下，会造成管理用户没有角色 --}}
                          <a class="layer_open" data-title="{{ $user->username }} / {{ $user->nickname }} 管理用户权限详情" href="{{ _route('admin:user.purview.show', $user->roles->first()->id) }}"><i class="fa fa-fw fa-info-circle" title="管理用户权限详情"></i></a>

                          {{ $user->roles->first()->name }}({{ $user->roles->first()->display_name }})
                          @else
                          NULL(空)
                          @endif
                        </td>
                        <td class="text-yellow">
                          @if($user->is_locked)
                          锁定
                          @else
                          正常
                          @endif
                        </td>
                        <td>{{ $user->updated_at }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  {!! $users->appends(['s_name' => request('s_name'), 's_phone' => request('s_phone')])->render() !!}
                </div>

              </div>
@stop

@section('extraSection')
  <!--引入layer插件-->
  <script src="{{ _asset(ref('layer.js')) }}"></script>
@stop

@section('filledScript')
        $('a.layer_open').on('click', function(evt){
            evt.preventDefault();
            var src = $(this).attr("href");
            var title = $(this).data('title');
            layer.open({
                type: 2,
                title: title,
                shadeClose: true,
                shade: 0.8,
                area: ['800px', '720px'],
                content: src //iframe的url
            });
        });
@stop