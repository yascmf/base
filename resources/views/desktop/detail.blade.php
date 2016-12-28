@extends('desktop.layout._base')


@section('mainContent')
        <div class="article">
            <div class="art_head">
                <h2>{{ $article->title }}</h2>
            </div>
            <div class="art_meta clearfix">
                <span class="icon-folder"></span> <a href="{{ slug_url($article->category->slug) }}" title="查看“{{ $article->category->name }}”分类下文章">{{ $article->category->name }}</a>    <span class="icon-calendar"></span> <a href="javascript:void(0);">{{ $article->created_at->format('Y-m-d') }}</a>
            </div>
            <div class="art_con">
            {!! mark2html($article->content) !!}
            </div>
        </div>
                        <?php
                            $_url = slug_url($article->category->slug, $article->slug, false);
                        ?>
        <div class="copyright_text">
            <p>作者署名：raoyc<br />
            原创说明：文章除非特别申明引用，否则均为原创。<br />
            授权协议：自由转载-非商用-非衍生-保持署名 | <a href="https://creativecommons.org/licenses/by-nc-nd/3.0/cn/">Creative Commons BY-NC-ND 3.0</a><br />
            原文网址：<a href="{{ $_url }}">{{ (request()->secure()) ? 'https:' : 'http:' }}{{ $_url }}</a><br />
            最后修改：{{ $article->updated_at }}</p>
        </div>
@endsection