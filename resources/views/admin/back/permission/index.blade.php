@extends('admin.layout._back')

@section('content-header')
@parent
          <h1>
            用户管理
            <small>权限</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ site_url('dashboard', 'admin') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
            <li class="active">用户管理 - 权限</li>
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
                  <h3 class="box-title">权限列表</h3>
                  <div class="box-tips clearfix">
                    <p><b>权限影响系统安全与稳定，错误或不合理的修改可能会影响系统业务与逻辑，故在此屏蔽掉权限 增、删、改 功能。</b><br />后续如果增加新的权限或者删改老的权限，可以使用SQL脚本来实现。</p>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                      <div class="form-group">
                        <div class="input-group">
                          @foreach($permissions as $index => $per)
                            @if(starts_with($per->name, '@') && $index !== 0)
                            <br>
                            @endif
                            <label class="choice" title="{{ $per->id}} : {{ $per->name }} [{{ $per->display_name }}]" style="width: 250px; text-align: center; border: 1px dotted #333; margin-right: 1px;"><span class="text-green">{{ $per->name }}</span>[<span class="text-red">{{ $per->display_name }}</span>]</label>
                          @endforeach
                        </div>
                      </div>
                </div><!-- /.box-body -->
              </div>
@stop

