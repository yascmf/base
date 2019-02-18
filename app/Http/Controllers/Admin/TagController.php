<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Douyasi\Http\Requests\TagRequest;
use Douyasi\Models\Tag;
use Gate;


/**
 * Tag控制器
 * 无关核心业务逻辑，直连模型操作
 *
 * @author raoyc <raoyc2009@gmail.com>
 */
class TagController extends BackController
{

    public function __construct()
    {
        parent::__construct();

        if (Gate::denies('@tag')) {
            $this->middleware('deny403');
        }
    }

    public function index(Request $request)
    {
        $tags = Tag::paginate(15);
        return view('admin.back.tag.index', compact('tags'));
    }

    public function create(Request $request)
    {
        if (Gate::denies('tag-write')) {
            return deny();
        }
        return view('admin.back.tag.create');
    }

    public function edit($id)
    {
        if (Gate::denies('tag-write')) {
            return deny();
        }
        $data = Tag::find($id);
        is_null($data) AND abort(404);
        return view('admin.back.tag.edit', compact('data'));
    }


    public function store(TagRequest $request)
    {
        if (Gate::denies('tag-write')) {
            return deny();
        }
        $inputs          = $request->all();
        $tag             = new Tag;
        $tag->name       = e($inputs['name']);
        $tag->type       = e($inputs['type']);
        $tag->descript   = e(trim($inputs['descript']));
        $tag->created_at = date('Y-m-d H:i:s');
        if ($tag->save()) {
            return redirect()->to(site_path('tag', 'admin'))->with('message', '成功新增标签！');
        } else {
            return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
        }
    }

    public function update(TagRequest $request, $id)
    {
        if (Gate::denies('tag-write')) {
            return deny();
        }
        $inputs          = $request->all();
        $tag             = Tag::find($id);
        $tag->name       = e($inputs['name']);
        $tag->type       = e($inputs['type']);
        $tag->descript   = e(trim($inputs['descript']));
        $tag->updated_at = date('Y-m-d H:i:s');
        if ($tag->save()) {
            return redirect()->to(site_path('tag', 'admin'))->with('message', '成功修改标签！');
        } else {
            return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
        }
    }

}
