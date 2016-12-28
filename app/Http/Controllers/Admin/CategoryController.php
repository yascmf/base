<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Douyasi\Http\Requests\CategoryRequest;
use Douyasi\Models\Category;
use Gate;


/**
 * 分类控制器
 * 无关核心业务逻辑，直连模型操作
 *
 * @author raoyc <raoyc2009@gmail.com>
 */
class CategoryController extends BackController
{

    public function __construct()
    {
        parent::__construct();

        if (Gate::denies('@category')) {
            $this->middleware('deny403');
        }
    }

    public function index(Request $request)
    {
        $categories = Category::paginate(15);
        return view('admin.back.category.index', compact('categories'));
    }

    public function create(Request $request)
    {
        if (Gate::denies('category-write')) {
            return deny();
        }
        return view('admin.back.category.create');
    }

    public function edit($id)
    {
        if (Gate::denies('category-write')) {
            return deny();
        }
        $data = Category::find($id);
        is_null($data) AND abort(404);
        return view('admin.back.category.edit', compact('data'));
    }


    public function store(CategoryRequest $request)
    {
        if (Gate::denies('category-write')) {
            return deny();
        }
        $inputs = $request->all();
        $category = new Category;
        $category->name = e($inputs['name']);
        $category->sort = e($inputs['sort']);
        $category->slug = e(trim($inputs['slug']));
        if($category->save()) {
            return redirect()->to(site_path('category', 'admin'))->with('message', '成功新增分类！');
        } else {
            return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
        }
    }

    public function update(CategoryRequest $request, $id)
    {
        if (Gate::denies('category-write')) {
            return deny();
        }
        $inputs =$request->all();
        $category = Category::find($id);
        $category->name = e($inputs['name']);
        $category->sort = e($inputs['sort']);
        $category->slug = e(trim($inputs['slug']));
        if($category->save()) {
            return redirect()->to(site_path('category', 'admin'))->with('message', '成功修改分类！');
        } else {
            return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
        }
    }

}
