@extends('admin.layout._back')

@section('content-header')
@parent
          <h1>
            用户管理
            <small>管理员</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ site_url('dashboard', 'admin') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
            <li><a href="{{ _route('admin:user.index') }}">用户管理 - 管理员</a></li>
            <li class="active">新增管理员</li>
          </ol>
@stop

@section('content')

          @if(session()->has('fail'))
            <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4>  <i class="icon icon fa fa-warning"></i> 提示！</h4>
              {{ session('fail') }}
            </div>
          @endif

          @if($errors->any())
            <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> 警告！</h4>
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
            </div>
          @endif

              <h2 class="page-header">新增管理员</h2>
              <form method="post" action="{{ _route('admin:user.store') }}" accept-charset="utf-8">
              {!! csrf_field() !!}
              <div class="nav-tabs-custom">
                  
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">主要信息</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">通联信息</a></li>
                  </ul>

                  <div class="tab-content">
                    
                    <div class="tab-pane active" id="tab_1">
                      <div class="form-group">
                        <label>登录(用户)名 <small class="text-red">*</small> <span class="text-green small">只能5-10位英文字母与阿拉伯数字组合</span></label>
                        <input type="text" class="form-control" name="username" autocomplete="off" value="{{ old('username') }}" placeholder="登录名">
                      </div>
                      <div class="form-group">
                        <label>角色(用户组) <small class="text-red">*</small></label>
                        <div class="input-group">
                          <select data-placeholder="选择角色..." class="chosen-select" style="min-width:280px;" name="role">
                          @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ ($role->name === 'Demo') ? 'selected':'' }}>{{ $role->name }}({{ $role->display_name }})</option>
                          @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>初始化登录密码 <small class="text-red">*</small> <span class="text-green small">只能6-16位数字、字母和部分特殊符号（0-9a-zA-Z~@#%）组合</span></label>
                        <input type="password" class="form-control" name="password" autocomplete="off" value="" placeholder="登录密码">
                      </div>
                      <div class="form-group">
                        <label>确认登录密码 <small class="text-red">*</small></label>
                        <input type="password" class="form-control" name="password_confirmation" autocomplete="off" value="" placeholder="重复上面登录密码">
                      </div>
                      <div class="form-group">
                        <label>电子邮件 <small class="text-red">*</small> <span class="text-green small">用于找回或重置登录密码等操作</span></label>
                        <input type="text" class="form-control" name="email" autocomplete="off" value="{{ old('email') }}" placeholder="电子邮件地址">
                      </div>
                      <div class="form-group">
                        <label>真实姓名 <small class="text-red">*</small> <span class="text-green small">用于身份确认，必须为2字以上的中文</span></label>
                        <input type="text" class="form-control" name="realname" autocomplete="off" value="{{ old('realname') }}" placeholder="真实姓名">
                      </div>
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                      <div class="form-group">
                        <label>手机号码 <span class="text-green small">用于通讯联络，请填写国内真实的手机号码</span></label>
                       <input type="text" class="form-control" name="phone" autocomplete="off" value="{{ old('phone') }}" placeholder="手机号码">
                      </div>
                    </div><!-- /.tab-pane -->

                    <button type="submit" class="btn btn-primary">新增管理员</button>

                  </div><!-- /.tab-content -->
                  
              </div>
              </form>

@stop

@section('extraPlugin')

  <!--引入iCheck组件-->
  <script src="{{ _asset(ref('icheck.js')) }}" type="text/javascript"></script>
  <!--引入Chosen组件-->
  @include('admin.scripts.endChosen')

@stop

