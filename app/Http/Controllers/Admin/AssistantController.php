<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Events\UserUpload;
use Douyasi\Cache\DataCache;


/**
 * 助手控制器
 *
 * @author raoyc <raoyc2009@gmail.com>
 */
class AssistantController extends BackController
{

    protected $validatorMessages = [
        'picture.image'   => '文件类型不允许,请上传常规的图片(bmp|gif|jpg|png)文件',
        'picture.max'    => '文件过大,文件大小不得超出5MB',
        'document.max'   => '文件过大,文件大小不得超出50MB',
        'document.mimes'   => '文件类型不允许,请上传常规的文档(doc|docx|xls|xlsx|ppt|pptx|pdf)文件或压缩(rar|zip|7z)文件',
    ];

    /**
     * 上传图片页面
     *
     * @return Response
     */
    public function getUploadPicture()
    {
        return view('admin.back.upload.picture_create');
    }

    /**
     * 上传文档页面
     *
     * @return Response
     */
    public function getUploadDocument()
    {
        return view('admin.back.upload.document_create');
    }

    /**
     * 上传图像文件
     * 允许上传的文件为 image mime
     * 上传逻辑直接放在控制器里予以处理，你也可剥离出一些代码到其它类里
     *
     * @return Response
     */
    public function postUploadPicture(Request $request)
    {
        if ($request->ajax()) {
            $json = [
                'status' => 0,
                'info' => '失败原因为：<span class="text_error">不存在待上传的文件</span>',
                'operation'=>'上传操作',
                'url' => '',
            ];
            if ($request->hasFile('picture')) {
                //
                $file = $request->file('picture');
                $data = $request->all();
                $rules = [
                    //'picture'    => 'image|max:2048',
                    'picture'    => 'max:5120',
                ];
                $messages = $this->validatorMessages;
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->passes()) {
                    $realPath = $file->getRealPath();
                    $destPath = 'uploads/content/';
                    $savePath = $destPath.''.date('Ymd', time());
                    is_dir($savePath) || mkdir($savePath);  //如果不存在则创建目录
                    $name = $file->getClientOriginalName();
                    $ext = $file->getClientOriginalExtension();

                    //----------
                    // 因本人生产服务器禁用掉fileinfo扩展特性，故无法通过框架自身Validation 'image'表单验证文件MIME类型，如果您的服务器开启fileinfo扩展可直接使用 'picture' => 'image|max:2048'验证规则
                    // 这里根据客户端上传文件扩展名来验证，存在一定的安全隐患，请将上传目录执行权限去掉
                    //----------

                    $check_ext = in_array($ext, ['jpg', 'png', 'gif', 'bmp'], true);

                    if ($check_ext) {
                        $uniqid = uniqid().'_'.date('s');
                        $oFile = $uniqid.'o.'.$ext;
                        $rFile = $uniqid.'rw300.'.$ext;

                        $fullfilename = '/'.$savePath.'/'.$oFile;  //原始完整路径
                        if ($file->isValid()) {
                            $uploadSuccess = $file->move($savePath, $oFile);  //移动文件

                            $user = auth()->user();
                            $file = [
                                'original_file_name' => $name,  //添加文件操作信息，原始文件名
                                'uploaded_full_file_name' => $fullfilename,  //添加文件操作信息，上传之后存储在服务器上的原始完整路径
                            ];
                            $type = 'picture';
                            event(new UserUpload($user, $file, $type));  //触发上传文件事件

                            $oFilePath = $savePath.'/'.$oFile;
                            $rFilePath = $savePath.'/'.$rFile;
                            
                            $json = array_replace($json, ['status' => 1, 'info' => $fullfilename]);
                        } else {
                            $json = array_replace($json, ['status' => 0, 'info' => '失败原因为：<span class="text_error">文件校验失败</span>']);
                        }
                    } else {
                        $json = array_replace($json, ['status' => 0, 'info' => '失败原因为：<span class="text_error">文件类型不允许,请上传常规的图片（bmp|gif|jpg|png）文件</span>']);
                    }
                } else {
                    $json = format_json_message($validator->messages(), $json);
                }
            }
            return response()->json($json);
        } else {
            //非ajax请求抛出异常
            return view('admin.back.exceptions.jump', ['exception' => '非法请求，不予处理！']);
        }
    }

    /**
     * 上传图像文件
     * 允许上传的文件为 image mime
     * 上传逻辑直接放在控制器里予以处理，你也可剥离出一些代码到其它类里
     *
     * @return Response
     */
    public function postUploadDocument(Request $request)
    {
        if ($request->ajax()) {
            $json = [
                'status' => 0,
                'info' => '失败原因为：<span class="text_error">不存在待上传的文件</span>',
                'operation'=>'上传操作',
                'url' => '',
            ];
            if ($request->hasFile('document')) {
                //
                $file = $request->file('document');
                $data = $request->all();
                $rules = [
                    //'document'    => 'mimes:doc,docx,xls,xlsx,ppt,pptx,pdf,rar,zip,7z|max:2048',
                    'document'    => 'max:51200',
                ];
                $messages = $this->validatorMessages;
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->passes()) {
                    $realPath = $file->getRealPath();
                    $destPath = 'uploads/content/';
                    $savePath = $destPath.''.date('Ymd', time());
                    is_dir($savePath) || mkdir($savePath);  //如果不存在则创建目录
                    $name = $file->getClientOriginalName();
                    $ext = $file->getClientOriginalExtension();

                    $check_ext = in_array($ext, ['doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip', '7z'], true);

                    if ($check_ext) {
                        $uniqid = uniqid().'_'.date('s');
                        $oFile = $uniqid.'o.'.$ext;
                        $rFile = $uniqid.'rw300.'.$ext;

                        $fullfilename = '/'.$savePath.'/'.$oFile;  //原始完整路径
                        if ($file->isValid()) {
                            $uploadSuccess = $file->move($savePath, $oFile);  //移动文件
                            
                            $user = auth()->user();
                            $file = [
                                'original_file_name' => $name,  //添加文件操作信息，原始文件名
                                'uploaded_full_file_name' => $fullfilename,  //添加文件操作信息，上传之后存储在服务器上的原始完整路径
                            ];
                            $type = 'document';
                            event(new UserUpload($user, $file, $type));  //触发上传文件事件

                            $oFilePath = $savePath.'/'.$oFile;
                            $rFilePath = $savePath.'/'.$rFile;
                            
                            $json = array_replace($json, ['status' => 1, 'info' => $fullfilename]);
                        } else {
                            $json = array_replace($json, ['status' => 0, 'info' => '失败原因为：<span class="text_error">文件校验失败</span>']);
                        }
                    } else {
                        $json = array_replace($json, ['status' => 0, 'info' => '失败原因为：<span class="text_error">文件类型不允许,请上传常规的文档(doc|docx|xls|xlsx|ppt|pptx|pdf)文件或压缩(rar|zip|7z)文件</span>']);
                    }
                } else {
                    $json = format_json_message($validator->messages(), $json);
                }
            }
            return response()->json($json);
        } else {
            //非ajax请求抛出异常
            return view('admin.back.exceptions.jump', ['exception' => '非法请求，不予处理！']);
        }
    }

    /**
     * 重建系统缓存
     * 更新内容或者刚安装完本CMS之后，如果数据显示异常，请执行本方法
     *
     * @return Response
     */
    public function getRebuildCache()
    {
        DataCache::cacheStatic();
        DataCache::cachePermission();
        return view('admin.back.cache.index');
    }
}
