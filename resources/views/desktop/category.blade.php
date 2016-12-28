@extends('desktop.layout._base')


@section('mainContent')
<div class="artlist_content">
<h2></h2>
            <div class="post_summary">
                {{ $category->name }}分类下共有 <em class="text-info">{{ $count }}</em> 篇文章
            </div>
            <ul class="art_list">
                @foreach($articles as $art)
                <li>
                    <h3><a href="{{ slug_url($art->category->slug, $art->slug) }}">{{ $art->title }}</a></h3>
                    <div class="art_desc">
                        <p>{{ $art->description }}</p>
                    </div>
                    <div class="split_border"></div>
                </li>
                @endforeach
            </ul>
            <div class="page clearfix">
                @include('desktop.parts.pagination', ['paginator' => $articles])
            </div>
</div>
@endsection