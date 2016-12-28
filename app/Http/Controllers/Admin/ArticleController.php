<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Douyasi\Http\Requests\ArticleRequest;
use Douyasi\Models\Article;
use Douyasi\Models\Category;
use Gate;


/**
 * 文章控制器
 * 无关核心业务逻辑，直连模型操作
 *
 * @author raoyc <raoyc2009@gmail.com>
 */
class ArticleController extends BackController
{

    public function __construct()
    {
        parent::__construct();

        if (Gate::denies('@article')) {
            $this->middleware('deny403');
        }
    }


    public function index(Request $request)
    {
        $s_title = $request->input('s_title');
        $s_cid = $request->input('s_cid');

        $categories = Category::all();
        $articles = Article::where('title', 'like', '%'.$s_title.'%')
                            ->where('cid', (($s_cid > 0) ? '=' : '<>'), $s_cid)
                            ->orderBy('created_at','desc')
                            ->paginate(15);

        $flags = config('ecms.flag.articles');
        return view('admin.back.article.index', compact('categories', 'articles', 'flags'));
    }

    public function create()
    {
        if (Gate::denies('article-write')) {
            return deny();
        }
        $categories = Category::all();
        return view('admin.back.article.create', compact('categories'));
    }

    public function store(ArticleRequest $request)
    {
        if (Gate::denies('article-write')) {
            return deny();
        }
        $inputs = $request->all();
        $article = new Article;
        $article->title = e($inputs['title']);
        $article->cid = intval($inputs['cid']);
        $article->description = e($inputs['description']);
        $article->content = $inputs['content'];
        $article->slug = $inputs['slug'];
        $article->thumb = empty($inputs['thumb']) ? '' : e($inputs['thumb']);
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
        $article->flag = $tmp_flag;
        if($article->save()) {
            return redirect()->to(site_path('article', 'admin'))->with('message', '成功撰写新文章！');
        } else {
            return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
        }
    }

    public function edit($id)
    {
        if (Gate::denies('article-write')) {
            return deny();
        }
        $article = Article::find($id);
        $categories = Category::all();
        is_null($article) AND abort(404);
        return view('admin.back.article.edit', compact('article', 'categories'));
    }

    public function update(ArticleRequest $request, $id)
    {
        if (Gate::denies('article-write')) {
            return deny();
        }
        $inputs = $request->all();
        $article = Article::find($id);
        $article->title = e($inputs['title']);
        $article->cid = intval($inputs['cid']);
        $article->description = e($inputs['description']);
        $article->content = $inputs['content'];
        $article->slug = $inputs['slug'];
        $article->thumb = empty($inputs['thumb']) ? '' : e($inputs['thumb']);
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
        $article->flag = $tmp_flag;
        if($article->save()) {
            return redirect()->to(site_path('article', 'admin'))->with('message', '成功更新文章！');
        } else {
            return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
        }
    }

}
