        {{-- SinglePic --}}

        {{-- 升级至layer 2.1, 不兼容1.8旧版 --}}

        $('.uploadPic').click(function(){
            var ele = $(this).data('id');
            layer.open({
                type: 2,
                title: false,
                closeBtn: 0,
                area: ['600px', '250px'],
                //skin: 'layui-layer-rim', //加上边框
                content: ['{{ _route('admin:upload.picture') }}?from=' + ele, 'no'],
                success: function(layero, index) {
                        console.log(layero);
                        $(layero['selector']).css('border-radius','6px');
                        $(layero['selector'] + ' .layui-layer-content').css('border-radius','6px');

                },
                cancel : function(index) {
                    layer.closeAll()
                },
                end : function(index){
                        //location.reload();
                }
            });
        });
        $('.previewPic').hover(function(){
            var ele = $(this).data('id');
            var pic_url = $.trim($('#'+ele).val());
            $.ajax({
                url: pic_url,
                type: 'GET',
                complete:  function(xhr){
                    status = xhr.status;
                    if(status === '200') {
                        tmp = '<div style="max-width: 300px;"><img src="' + pic_url + '" width="300" /></div>';
                    } else {
                         tmp = '<div style="max-width: 300px; background-color: #000; min-height: "><p style="margin:10px; color: #f00;">没有图片地址，或者图片资源不存在或受限于其托管服务器，暂时无法预览！</p></div>';
                    }
                    $('#layerPreviewPic').html(tmp);
                    layer.open({
                        type: 1,
                        //skin: 'layui-layer-rim',
                        shade: 0,
                        //shadeClose: false,
                        //scrollbar: false,
                        title: false,
                        fix: false,
                        area: '300px',
                        offset: '50px',
                        content: $('#layerPreviewPic')
                    });
                }
            });
        });
        

