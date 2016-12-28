<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Douyasi\Http\Requests\PictureRequest;
use Douyasi\Models\Picture;
use Gate;


/**
 * 图链控制器
 * 无关核心业务逻辑，直连模型操作
 *
 * @author raoyc <raoyc2009@gmail.com>
 */
class PictureController extends BackController
{

    public function __construct()
    {
        parent::__construct();

        if (Gate::denies('@picture')) {
            $this->middleware('deny403');
        }
    }

    public function index()
    {
        $pictures = Picture::orderBy('sort', 'DESC')->paginate(15);
        $flags = config('ecms.flag.pictures');
        return view('admin.back.picture.index', compact('pictures', 'flags'));
    }

    public function create()
    {
        if (Gate::denies('picture-write')) {
            return deny();
        }
        return view('admin.back.picture.create', compact('banners'));
    }

    public function store(PictureRequest $request)
    {
        if (Gate::denies('picture-write')) {
            return deny();
        }

        $inputs = $request->all();

        $picture = new Picture;
        $picture->title = e(trim($inputs['title']));
        $picture->src  = e(trim($inputs['src']));
        $picture->link = trim($inputs['link']);
        $picture->sort = e($inputs['sort']);
        $tmp_flag = '';
        /*这里需要对推荐位flag进行处理*/
        if(!empty($inputs['flag']) && is_array($inputs['flag'])) {
            foreach($inputs['flag'] as $flag)
            {
                if(!empty($flag)){
                    $tmp_flag .= $flag.',';
                }
            }
        }
        $picture->flag = $tmp_flag;
        if($picture->save()) {
            return redirect()->to(site_path('picture', 'admin'))->with('message', '成功新增图链！');
        } else {
            return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
        }

    }

    public function edit($id)
    {
        if (Gate::denies('picture-write')) {
            return deny();
        }

        $picture = Picture::find($id);
        is_null($picture) AND abort(404);
        return view('admin.back.picture.edit')->with('data', $picture);
    }

    public function update(PictureRequest $request, $id)
    {
        if (Gate::denies('picture-write')) {
            return deny();
        }

        $inputs = $request->all();
        
        $picture = Picture::find($id);
        $picture->title = e(trim($inputs['title']));
        $picture->src  = e(trim($inputs['src']));
        $picture->link = trim($inputs['link']);
        $picture->sort = e($inputs['sort']);
        $tmp_flag = '';
        /*这里需要对推荐位flag进行处理*/
        if(!empty($inputs['flag']) && is_array($inputs['flag'])) {
            foreach($inputs['flag'] as $flag)
            {
                if(!empty($flag)){
                    $tmp_flag .= $flag.',';
                }
            }
        }
        $picture->flag = $tmp_flag;
        if($picture->save()) {
            return redirect()->to(site_path('picture', 'admin'))->with('message', '成功修改图链！');
        } else {
            return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
        }
    }


}
