@extends('admin.layout._back')

@section('content-header')
    @parent
    <h1>
        内容管理
        <small>标签</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ site_url('dashboard', 'admin') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="{{ _route('admin:tag.index') }}">内容管理 - 标签</a></li>
        <li class="active">新增标签</li>
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

    <h2 class="page-header">新增标签</h2>
    <form method="post" action="{{ _route('admin:tag.store') }}" accept-charset="utf-8">
        {!! csrf_field() !!}
        <div class="nav-tabs-custom">

            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a></li>
            </ul>

            <div class="tab-content">

                <div class="tab-pane active" id="tab_1">
                    <div class="form-group">
                        <label>标签类别 <small class="text-red">*</small></label>
                        <div class="input-group">
                            <select data-placeholder="选择类别" class="chosen-select" style="min-width:200px;" name="type">
                                @foreach (config('ecms.tag.type') as $k => $v)
                                    <option value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>标签名称
                            <small class="text-red">*</small>
                        </label>
                        <input type="text" class="form-control" name="name" autocomplete="off" value="{{ old('name') }}"
                               placeholder="标签名称" maxlength="20">
                    </div>
                    <div class="form-group">
                        <label>标签描述 </label>
                        <textarea class="form-control" name="descript" rows="3" cols="200" autocomplete="off" placeholder="请输入文本">{{ old('descript') }}</textarea>
                    </div>

                </div><!-- /.tab-pane -->

                <button type="submit" class="btn btn-primary">新增标签</button>

            </div><!-- /.tab-content -->

        </div>
    </form>
@stop


@section('extraPlugin')

@stop