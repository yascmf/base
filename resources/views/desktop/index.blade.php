@extends('desktop.layout._base')


@section('mainContent')

        <div class="artlist_content">
            <ul class="art_list">
                @foreach($articles as $art)
                <li>
                    <h3><a href="{{ slug_url($art->category->slug, $art->slug) }}">{{ $art->title }}</a></h3>
                    <div class="art_desc">
                        <p>{{ $art->description }}</p>
                    </div>
                    <div class="art_meta clearfix">
                        <span class="icon-folder"></span> <a href="{{ slug_url($art->category->slug) }}" title="查看“{{ $art->category->name }}”分类下文章">{{ $art->category->name }}</a>    <span class="icon-calendar"></span> <a href="javascript:void(0);">{{ $art->created_at->format('Y-m-d') }}</a>
                    </div>
                    <div class="split_border"></div>
                </li>
                @endforeach
            </ul>
            <div class="page clearfix">
                {{ $articles->links('desktop.pagination.simple') }}
            </div>
        </div>

@endsection