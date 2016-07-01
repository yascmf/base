@extends('admin.layout._back')

@section('content-header')
@parent
          <h1>
            开发演示
            <small>表单</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ site_url('dashboard', 'admin') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
            <li class="active">开发演示 - 表单</li>
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

              <h2 class="page-header">表单写入</h2>
              <form method="post" action="javascript:void(0);" accept-charset="utf-8">
              {!! csrf_field() !!}
              {!! method_field('put') !!}
              <div class="nav-tabs-custom">
                  
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">附加内容</a></li>
                  </ul>

                  <div class="tab-content">
                    
                    <div class="tab-pane active" id="tab_1">
                      <div class="form-group">
                        <label>单行文本输入框 <small class="text-red">*</small></label>
                        <input type="text" class="form-control" name="text" autocomplete="off" value="{{ old('text') }}" placeholder="文本框">
                      </div>
                      <div class="form-group">
                        <label>多选项 - 推荐位属性</label>
                        <div class="input-group">
                          <input type="checkbox" name="flag[]" value="l" {{ (check_string($flag, 'l') === true) ? 'checked' : '' }}>
                          <label class="choice" for="flag[]" title="可用于友情链接" data-value="l" style="cursor: pointer;">[l]链接</label>
                          <input type="checkbox" name="flag[]" value="f" {{ (check_string($flag, 'f') === true) ? 'checked' : '' }}>
                          <label class="choice" for="flag[]" title="可用于页面幻灯片模型" data-value="f" style="cursor: pointer;">[f]幻灯</label>
                          <input type="checkbox" name="flag[]" value="s" {{ (check_string($flag, 's') === true) ? 'checked' : '' }}>
                          <label class="choice" for="flag[]" title="可用于页面滚动效果的文章" data-value="s" style="cursor: pointer;">[s]滚动</label>
                          <input type="checkbox" name="flag[]" value="h" {{ (check_string($flag, 'h') === true) ? 'checked' : '' }}>
                          <label class="choice" for="flag[]" title="可用于页面推荐性文章" data-value="h" style="cursor: pointer;">[h]热门</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>下拉单选项 - 分类 <small class="text-red">*</small></label>
                        <div class="input-group">
                          <select data-placeholder="选择下拉项..." class="chosen-select" style="min-width:200px;" name="cat_id">
                          @foreach ($categories as $k => $v)
                            <option value="{{ $k }}">{{ $v }}</option>
                          @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                      <label>单选项 - 是否锁定 <small class="text-red">*</small></label>
                      <div class="input-group">
                        <input type="radio" name="is_locked" value="0" {{ ($is_locked === 0) ? 'checked' : '' }}>
                        <label class="choice" for="radiogroup">否</label>
                        <input type="radio" name="is_locked" value="1" {{ ($is_locked === 1) ? 'checked' : '' }}>
                        <label class="choice" for="radiogroup">是</label>
                      </div>
                    </div>
                      <div class="form-group">
                        <label>图片上传  <a href="javascript:void(0);" class="uploadPic" data-id="thumb"><i class="fa fa-fw fa-picture-o" title="上传"></i></a>  <a href="javascript:void(0);" class="previewPic" data-id="thumb"><i class="fa fa-fw fa-eye" title="预览小图"></i></a></label>
                        <input type="text" class="form-control" id="thumb" name="picture" value="{{ old('picture') }}" placeholder="图片地址：如{{ url('') }}/assets/img/yas_logo.png" readonly="readonly">
                      </div>
                      <div class="form-group">
                        <label>文档上传 <a href="javascript:void(0);" class="uploadFile" data-id="file"><i class="fa fa-fw fa-file-o" title="上传"></i></a></label>
                        <input type="text" class="form-control" id="file" name="document" value="{{ old('document') }}" placeholder="文件地址：如{{ url('') }}/assets/doc/yas_logo.pdf">
                      </div>
                      <div class="form-group">
                        <label>多行文本输入域 <small class="text-red">*</small></label>
                        <textarea class="form-control" name="textarea" rows="3" cols="200" autocomplete="off" placeholder="请输入文本">{{ old('textarea') }}</textarea>
                      </div>
                      <div class="form-group">
                        <label>富文本编辑器 <small class="text-red">*</small></label>
                        <textarea class="form-control" id="ckeditor" name="editor">{{ old('editor') }}</textarea>
                        @include('admin.scripts.endCKEditor'){{-- 引入CKEditor编辑器相关JS依赖 --}}
                      </div>
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                      <div class="form-group">
                        <label>日期选择输入框</label>
                        <input type="text" class="form-control" name="date_picker" minlength="10"　maxlength="10" placeholder＝"编辑时间" onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss',skin:'twoer'})" value="{{ old('date_picker', date('Y-m-d H:i:s')) }}">
                      </div>
                    </div><!-- /.tab-pane -->

                    <button type="submit" class="btn btn-primary">表单写入</button>

                  </div><!-- /.tab-content -->
                  
              </div>
              </form>
          <div id="layerPreviewPic" class="fn-hide">
            
          </div>

@stop

@section('extraPlugin')

  <!--引入Layer组件-->
  <script src="{{ _asset(ref('layer.js')) }}"></script>
  <!--引入iCheck组件-->
  <script src="{{ _asset(ref('icheck.js')) }}" type="text/javascript"></script>
  <!--引入My97DatePicker日期插件-->
  <script src="{{ _asset(ref('my97datepicker.js')) }}" type="text/javascript"></script>
  <!--引入Chosen组件-->
  @include('admin.scripts.endChosen')


@stop


@section('filledScript')
        <!--启用iCheck响应checkbox与radio表单控件-->
        $('input[name="flag[]"]').iCheck({
          checkboxClass: 'icheckbox_flat-blue',
          increaseArea: '20%', // optional
        });
        $('input[name="is_locked"]').iCheck({
          radioClass: 'iradio_flat-blue',
          increaseArea: '20%' // optional
        });

        <!--响应点击label 选中或者取消选中-->
        $('label.choice').click(function() {
            var value = $(this).data('value');
            $('input[name="flag[]"][value='+value+']').iCheck('toggle');
        });
        @include('admin.scripts.endSinglePic') {{-- 引入单个图片上传与预览JS，依赖于Layer --}}


        //上传文件
        $('.uploadFile').click(function(){
            var ele = $(this).data('id');
            layer.open({
                type : 2,
                closeBtn : false,
                title: false,
                fix: false,
                area : ['600px' , '250px'],
                offset : ['', ''],
                content: ['{{ _route('admin:upload.document') }}?from=' + ele],
                success: function(layero){
                        console.log(layero);
                        $(layero['selector']).css('border-radius','6px');
                        $(layero['selector'] + ' .layui-layer-content').css('border-radius','6px');
                },
                cancel : function(index){
                    layer.closeAll();
                },
                end : function(index){
                    //location.reload();
                }
            });
        });

@stop
