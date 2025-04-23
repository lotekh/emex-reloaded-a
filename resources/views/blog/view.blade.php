@extends('layout.layout')

@section('seo')
    <title>{{ $model->title }}</title>
    @if(isset($model->seo['meta_keywords']))
        <meta name="keywords" content="{{ $model->seo['meta_keywords'] ?? '' }}">
    @endif

    @if(isset($model->seo['meta_description']))
        <meta name="description" content="{{ $model->seo['meta_description'] ?? '' }}">
    @endif

    @if(isset($model->seo['fb_app_id']))
        <meta property="fb:app_id" content="{{ $model->seo['fb_app_id'] ?? '' }}">
    @endif
    <meta property="og:locale" content="ro_RO">

    @if(isset($model->seo['og_title']))
        <meta property="og:title" content="{{ $model->seo['og_title'] ?? '' }}">
    @endif

    @if(isset($model->seoOgImage))
        <meta property="og:image" content="{{ $model->seoOgImage ? str_replace('https://', 'https://www.', $model->seoOgImage->url) : '' }}">
    @endif

    @if(isset($model->seo['og_image_width']))
        <meta property="og:image:width" content="{{ $model->seo['og_image_width'] ?? '' }}" />
    @endif

    @if(isset($model->seo['og_image_height']))
        <meta property="og:image:height" content="{{ $model->seo['og_image_height'] ?? '' }}" />
    @endif

    @if(isset($model->seo['og_alt']))
        <meta property="og:image:alt" content="{{ $model->seo['og_alt'] ?? '' }}" />
    @endif

    @if(isset($model->seo['og_description']))
        <meta property="og:description" content="{{ $model->seo['og_description'] ?? '' }}">
    @endif

    @if(isset($model->seo['og_url']))
        <meta property="og:url" content="{{ $model->seo['og_url'] ?? '' }}">
    @endif

    @if(isset($model->seo['og_site_name']))
        <meta property="og:site_name" content="{{ $model->seo['og_site_name'] ?? '' }}">
    @endif

    @if(isset($model->seo['og_type']))
        <meta property="og:type" content="{{ $model->seo['og_type'] ?? '' }}" />
    @endif

    @if(isset($model->seo['twitter_card']))
        <meta name="twitter:card" content="{{ $model->seo['twitter_card'] ?? '' }}">
    @endif

    @if(isset($model->seo['twitter_site']))
        <meta name="twitter:site" content="{{ isset($model->seo['twitter_site']) ? $model->seo['twitter_site'] : '' }}">
    @endif

    @if(isset($model->seoTwitterImage))
        <meta name="twitter:image" content="{{ $model->seoTwitterImage ? str_replace('https://', 'https://www.', $model->seoTwitterImage->url) : '' }}">
    @endif

    @if(isset($model->seo['twitter_title']))
        <meta name="twitter:title" content="{{ $model->seo['twitter_title'] ?? '' }}">
    @endif

    @if(isset($model->seo['twitter_description']))
        <meta name="twitter:description" content="{{ $model->seo['twitter_description'] ?? '' }}">
    @endif

    @if(isset($model->seo['twitter_url']))
        <meta name="twitter:url" content="{{ $model->seo['twitter_url'] ?? '' }}">
    @endif
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bundled/blog.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/">Acasa</a></li><li class="separator">/</li><li class="-ml-4"><a href="/blog">Blog</a></li><li class="separator">/</li><li class="-ml-4 ellipsis"><a href="/blog/article?id=1">{{$model->title}}</a></li></ul>
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
    <div class="article article-view col-span-3">
        <h1 class="sti align-left">{{ $model->title }}</h1>
        <div class="flex mb-16 align-center">
            <span class="publish-date">publicat pe {{ \Carbon\Carbon::parse($model->created_at)->format('j.m.Y') }}</span>
        </div>

        <div class="flex col align-center" id="description-blog">
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
                <input id="search-input-blog-desktop" type="text" name="zoom_query" class="form-control w-full" placeholder="Cautare...">
            </form>
        </div>

        <div class="flex col mb-32">
            <h2 class="m-0 mb-8">Postari recente</h2>
            @if (count($recentArticles))
                @foreach ($recentArticles as $recentArticle)
                    <a class="link_color1" href="{{ route('blog.article.show', ['slug' => $recentArticle->slug]) }}">
                        {{ $recentArticle->title }}
                    </a>
                @endforeach
            @else
                <p>Nu au fost gasite articole recente</p>
            @endif
        </div>

        {{-- <div class="flex col mb-32">
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
        </div> --}}

        <div class="flex col mb-32">
            <h2 class="m-0 mb-8">Arhiva</h2>
            @php
                $archivedArticles = \App\Models\BlogArticle::orderBy('created_at', 'desc')->get();
            @endphp
            <div style="max-height: 300px; overflow-y: auto;">
                @foreach ($archivedArticles as $article)
                    <a class="link_color1" href="{{ route('blog.article.show', ['slug' => $article->slug]) }}" style="display: block; margin-bottom: 5px;">
                        {{ $article->title }}
                    </a>
                @endforeach
            </div>
            
        </div>
        

        @if (count($model->tags))
            <div class="tags-container">
                <h2 class="m-0 mb-8">Tags</h2>
                <div class="tags-list">
                    @foreach ($model->tags as $tag)
                        <a class="tag-item" href="{{ route('blog.searchByTag', ['tagId' => $tag->id]) }}">
                            <span>{{ $tag->name }}</span>@if(!$loop->last),&nbsp; @endif
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>
@endsection
