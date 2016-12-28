@extends('admin.layout._back')

@section('content-header')
@parent
          <h1>
            内容管理
            <small>文章</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ site_url('dashboard', 'admin') }}"><i class="fa fa-dashboard"></i> 主页</a></li>
            <li><a href="{{ _route('admin:article.index') }}">内容管理 - 文章</a></li>
            <li class="active">修改文章</li>
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

              <h2 class="page-header">修改文章</h2>
              <form method="post" action="{{ _route('admin:article.update', $article->id) }}" accept-charset="utf-8">
              {!! method_field('put') !!}
              {!! csrf_field() !!}
              <div class="nav-tabs-custom">
                  
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a></li>
                  </ul>
                  <div class="tab-content">
                    
                    <div class="tab-pane active" id="tab_1">
                      <div class="form-group">
                        <label>标题 <small class="text-red">*</small></label>
                        <input type="text" class="form-control" name="title" autocomplete="off" value="{{ old('title', isset($article) ? $article->title : null) }}" placeholder="标题">
                      </div>
                      <div class="form-group">
                        <label>网址缩略名(slug) <small class="text-red">*</small> <span class="text-green">[a-z0-9\-_]{1,120}</span> <a href="javascript:void(0);" class="auto-to-pinyin"><i class="fa fa-fw fa-hand-o-down" title="自动转换"></i></a></label>
                        <div class="input-group mono url_slug">
                          <p>//example.org/{category}/<input type="text" id="slug" name="slug" autocomplete="off" value="{{ old('slug', isset($article) ? $article->slug : null) }}" class="slug" maxlength="120" pattern="[a-z0-9_-]{1,120}">.html</p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>推荐位属性</label>
                        <div class="input-group">
                          @foreach(config('ecms.flag.articles') as $k => $v)
                          <input type="checkbox" name="flag[]" value="{{ $k }}" {{ (check_string($article->flag, $k) === true) ? 'checked' : '' }}>
                          <label class="choice" for="flag[]" title="{{ $v }}" data-value="{{ $k }}" style="cursor: pointer;">[{{ $k }}]{{ $v }}</label>
                          @endforeach
                        </div>
                      </div>
                      <div class="form-group">
                        <label>分类 <small class="text-red">*</small></label>
                        <div class="input-group">
                          <select data-placeholder="选择文章分类..." class="chosen-select" style="min-width:200px;" name="cid">
                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ ($article->cid == $category->id) ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
                          @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>缩略图  <a href="javascript:void(0);" class="uploadPic" data-id="thumb"><i class="fa fa-fw fa-picture-o" title="上传"></i></a>  <a href="javascript:void(0);" class="previewPic" data-id="thumb"><i class="fa fa-fw fa-eye" title="预览小图"></i></a></label>
                        <input type="text" class="form-control" id="thumb" name="thumb" value="{{ old('thumb', isset($article) ? $article->thumb : null) }}" placeholder="缩略图地址：如{{ url('') }}/assets/img/yas_logo.png" readonly="readonly">
                      </div>
                      <div class="form-group">
                        <label>文章摘要 <small class="text-red">*</small><span class="text-green">min:10</span></label>
                        <textarea class="form-control" name="description" rows="3" cols="200" autocomplete="off" placeholder="文章摘要">{{ old('description', isset($article) ? $article->description : null) }}</textarea>
                      </div>

                      <div class="form-group">
                        <label>正文(Markdown) <small class="text-red">*</small><span class="text-green">min:20</span></label>
                        <div id="mdeditor">
                          <textarea class="form-control" name="content" style="display:none;">{{ old('content', isset($article) ? $article->content : '> hello editor.md') }}</textarea>
                        </div>
                      </div>
                    </div><!-- /.tab-pane -->

                    <button type="submit" class="btn btn-primary">修改文章</button>

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
  {!! editor_css() !!}
  {!! editor_js() !!}
  {!! editor_config('mdeditor') !!}

@stop


@section('filledScript')
        <!--缩略名自适应宽度 部分代码来自typecho-->
        function input_auto_size(sw, ele) {
              var t = $(ele), l = t.val().length;
              if (l > 0) {
                var s = (l <= 120) ? l : 120;
                t.css('width', 'auto').attr('size', s);
              } else {
                t.css('width', sw).removeAttr('size');
              }
        }

        var slug = $('#slug');

        if (slug.length > 0) {
          var sw = slug.width();
          var sl = slug.val().length;
          if (sl > 0) {
            var size = (sl <= 120) ? sl : 120;
            slug.css('width', 'auto').attr('size', size);
          }
          slug.bind('input propertychange', function () {
              input_auto_size(sw, this);
          }).width();
        }

        $('.auto-to-pinyin').click(function () {
            var _name = $('input[name="title"]').val();
            var _url = "{{ _route('api:pinyin') }}";
            var _param = {
              'content' : _name
            };
            $.get(_url, _param, function (_data) {
              if (_data.status) {
                var len = _data.slug.length;
                if (len <= 120) {
                  $('input[name="slug"]').val(_data.slug);
                  input_auto_size(sw, 'input[name="slug"]');
                }
              }
            });
         });

        <!--启用iCheck响应checkbox与radio表单控件-->
        $('input[name="flag[]"]').iCheck({
          checkboxClass: 'icheckbox_flat-blue',
          increaseArea: '20%', // optional
        });

        <!--响应点击label 选中或者取消选中-->
        $('label.choice').click(function() {
            var value = $(this).data('value');
            $('input[name="flag[]"][value='+value+']').iCheck('toggle');
        });
        @include('admin.scripts.endSinglePic') {{-- 引入单个图片上传与预览JS，依赖于Layer --}}
@stop
