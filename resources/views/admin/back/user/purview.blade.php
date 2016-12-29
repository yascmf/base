<?php error_reporting(0); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>layer</title>
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ _asset(ref('bootstrap.css')) }}" />
    <link rel="stylesheet" href="{{ _asset(ref('font-awesome.css')) }}" />
    <script type="text/javascript" src="{{ _asset(ref('jquery.js')) }}"></script>
    <script type="text/javascript" src="{{ _asset(ref('layer.js')) }}"></script>
    <link href="{{ _asset('back/dist/css/yascmf.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ _asset(ref('icheck_all.css')) }}" rel="stylesheet" type="text/css" />

</head>
<body>
<div class="layerForm" style="margin: 10px; padding-left: 20px;">

                <div class="tab-pane active" id="tab_1">
                  <div class="form-horizontal">
                    <div class="form-group">
                        <label>角色权限 <small class="text-red">*</small></label>
                        <div class="input-group">
                          @foreach($permissions as $index => $per)
                            @if(starts_with($per->name, '@') && $index !== 0)
                            <br>
                            @endif
                            <input type="checkbox" name="permissions[]" value="{{ $per->id }}" {{ (check_array($cans,'id', $per->id) === true) ? 'checked' : '' }} readonly="readonly">
                            <label class="choice" for="permissions[]" data-value="{{ $per->id }}" style="cursor: pointer;"><span class="text-green">{{ $per->name }}</span>[<span class="text-red">{{ $per->display_name }}</span>]</label>
                          @endforeach
                        </div>
                    </div>
                  </div>

                </div><!-- /.tab-pane -->

</div>
<div id="layerPreviewPic" class="fn-hide">

</div>

<!--引入iCheck组件-->
<script src="{{ _asset(ref('icheck.js')) }}" type="text/javascript"></script>
<script type="text/javascript">
    var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
    $('.layer-close').on('click', function(){
        parent.layer.close(index); //执行关闭
    });
    <!--启用iCheck响应checkbox与radio表单控件-->
        $('input[name="permissions[]"]').iCheck({
          checkboxClass: 'icheckbox_flat-blue',
          increaseArea: '20%', // optional
        });

        <!--响应点击label 选中或者取消选中-->
        $('label.choice').click(function() {
            var value = $(this).data('value');
            $('input[name="permissions[]"][value='+value+']').iCheck('toggle');
        });
</script>
</body>
</html>
