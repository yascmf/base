<?php

namespace App\Http\Controllers\Admin;

use Douyasi\Models\tag;
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
        $s_cid   = $request->input('s_cid');

        $categories = Category::all();
        $_tags = Tag::getTagsFormat();
        $articles   = Article::where('title', 'like', '%' . $s_title . '%')
            ->where('cid', (($s_cid > 0) ? '=' : '<>'), $s_cid)
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $flags = config('ecms.flag.articles');
        return view('admin.back.article.index', compact('categories', 'articles', 'flags', '_tags'));
    }

    public function create()
    {
        if (Gate::denies('article-write')) {
            return deny();
        }
        $categories = Category::all();
        $tags       = Tag::all();
        return view('admin.back.article.create', compact('categories', 'tags'));
    }

    public function store(ArticleRequest $request)
    {
        if (Gate::denies('article-write')) {
            return deny();
        }
        $inputs               = $request->all();
        $article              = new Article;
        $article->title       = e($inputs['title']);
        $article->cid         = intval($inputs['cid']);
        $article->description = e($inputs['description']);
        $article->content     = $inputs['content'];
        $article->slug        = $inputs['slug'];
        $article->thumb       = empty($inputs['thumb']) ? '' : e($inputs['thumb']);
        $tmp_flag             = '';
        /*这里需要对推荐位flag进行处理*/
        if (!empty($inputs['flag']) && is_array($inputs['flag'])) {
            foreach ($inputs['flag'] as $flag) {
                if (!empty($flag)) {
                    $tmp_flag .= $flag . ',';
                }
            }
        }
        $article->flag = trim($tmp_flag, ',');
        $tmp_tag       = '';
        /*这里需要对tag进行处理*/
        if(count($inputs['tag']) > 4){
            return redirect()->back()->withInput($request->input())->with('fail', '最多只能选4个Tag！');
        }
        if (!empty($inputs['tag']) && is_array($inputs['tag'])) {
            foreach ($inputs['tag'] as $tag) {
                if (!empty($tag)) {
                    $tmp_tag .= $tag . ',';
                }
            }
        }
        $article->tags = trim($tmp_tag, ',');
        $article->created_at = date('Y-m-d H:i:s');
        if ($article->save()) {
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
        $article    = Article::find($id);
        $categories = Category::all();
        $tags       = Tag::all();
        is_null($article) AND abort(404);
        return view('admin.back.article.edit', compact('article', 'categories', 'tags'));
    }

    public function update(ArticleRequest $request, $id)
    {
        if (Gate::denies('article-write')) {
            return deny();
        }
        $inputs               = $request->all();
        $article              = Article::find($id);
        $article->title       = e($inputs['title']);
        $article->cid         = intval($inputs['cid']);
        $article->description = e($inputs['description']);
        $article->content     = $inputs['content'];
        $article->slug        = $inputs['slug'];
        $article->thumb       = empty($inputs['thumb']) ? '' : e($inputs['thumb']);
        $tmp_flag             = '';
        /*这里需要对推荐位flag进行处理*/
        if (!empty($inputs['flag']) && is_array($inputs['flag'])) {
            foreach ($inputs['flag'] as $flag) {
                if (!empty($flag)) {
                    $tmp_flag .= $flag . ',';
                }
            }
        }
        $article->flag = trim($tmp_flag, ',');
        $tmp_tag       = '';
        /*这里需要对tag进行处理*/
        if(count($inputs['tag']) > 4){
            return redirect()->back()->withInput($request->input())->with('fail', '最多只能选4个Tag！');
        }
        if (!empty($inputs['tag']) && is_array($inputs['tag'])) {
            foreach ($inputs['tag'] as $tag) {
                if (!empty($tag)) {
                    $tmp_tag .= $tag . ',';
                }
            }
        }
        $article->tags = trim($tmp_tag, ',');
        $article->updated_at = date('Y-m-d H:i:s');
        if ($article->save()) {
            return redirect()->to(site_path('article', 'admin'))->with('message', '成功更新文章！');
        } else {
            return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
        }
    }

}
