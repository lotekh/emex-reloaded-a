@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="/{{ minify('css/blog.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/">Acasa</a></li><li class="separator">/</li><li class="font-xs -ml-4"><a href="/blog">Blog</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis"><a href="/blog/article?id=1">Pardosela Epoxidica „Emex Quartz”</a></li></ul>
@endsection

@section('content')
<div class="hidden-xs">
    <div class="top_header_image_bg">
        <div class="header_img_bg col justify-center align-center" id="blog_header" style="background: url('{{ asset('resources/images/blog/blog-background.jpg') }}')">
            <h1 class="z-10">
                {{ $model->title }}
            </h1>
        </div>
    </div>
</div>

<div class="main-container grid grid-4 gap-xl">
    <div class="article col-span-3">
        <h1>{{ $model->title }}</h1>
        <div class="flex mb-16 align-center">
            @foreach ($model->tags as $tag)
                <span class="tag mr-8">{{ $tag->name }}</span>
            @endforeach
            <span class="publish-date">publicat pe {{ \Carbon\Carbon::parse($model->created_at)->format('j.m.Y') }}</span>
        </div>

        <div class="flex col align-center">
            <div>
                {!! $model->body !!}
            </div>
        </div>
    </div>

    <div class="flex col mt-16">
        <div class="flex col mb-32">
            <h2 class="m-0 mb-8">Cautare</h2>
            <form class="relative flex align-center w-full justify-end" method="GET" action="{{ url('/search') }}">
                <div class="flex align-center">
                    <img id="search-icon-blog" width="18" height="18" src="{{ asset('resources/new_design/icons/search.svg') }}" alt="search-icon" title="search-icon">
                </div>
                <input id="search-input-desktop" type="text" name="zoom_query" class="form-control w-full" placeholder="Cautare...">
            </form>
        </div>

        <div class="flex col mb-32">
            <h2 class="m-0 mb-8">Postari recente</h2>
            @if (count($recentArticles))
                @foreach ($recentArticles as $recentArticle)
                    <a href="{{ route('blog.article.show', ['slug' => $recentArticle->slug]) }}">
                        {{ $recentArticle->title }}
                    </a>
                @endforeach
            @else
                <p>Nu au fost gasite articole recente</p>
            @endif
        </div>

        <div class="flex col mb-32">
            <h2 class="m-0 mb-8">Arhiva</h2>
            @php
                $monthNames = ['ianuarie', 'februarie', 'martie', 'aprilie', 'mai', 'iunie', 'iulie', 'august', 'septembrie', 'octombrie', 'noiembrie', 'decembrie'];
            @endphp
            @foreach ($archives as $archive)
                <p>
                    <a href="{{ route('blog.search.archive', ['year' => $archive['year'], 'month' => $archive['month']]) }}">
                        {{ $monthNames[$archive['month'] - 1] }} {{ $archive['year'] }}
                    </a>
                    ({{ $archive['articles_number'] }})
                </p>
            @endforeach
        </div>

        @if (count($model->tags))
            <div class="flex col">
                <h2 class="m-0 mb-8">Tags</h2>
                @foreach ($model->tags as $tag)
                    <a href="{{ route('blog.searchByTag', ['tagId' => $tag->id]) }}">
                        <span class="tag mr-8">{{ $tag->name }}</span>
                    </a>
                @endforeach
            </div>
        @endif

    </div>
</div>
@endsection
