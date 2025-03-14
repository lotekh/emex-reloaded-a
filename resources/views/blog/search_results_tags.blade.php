@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bundled/blog.min.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li><a href="/">Acasa</a></li><li class="separator">/</li><li class="-ml-4 ellipsis">Blog</li></ul>
@endsection

@section('content')
<div id="content">

    <div class="hidden-xs">
        <div class="top_header_image_bg">
            <div class="col justify-center align-center" id="blog_header" style="background: url('{{ asset('resources/images/blog/blog-background.jpg') }}');">
                <h1 class="z-10">
                    EMEX BLOG
                </h1>
            </div>
        </div>
    </div>


    <div class="main-container">
        <h2 id="header_search_tags" class="flex align-center mt-32">Articole cu tagul <span id="span_search_tags" class="tag ml-8">{{ $tag->name }}</span></h2>

        @foreach ($blogArticles as $key => $blogArticle)
            <div class="article">
                <a href="{{ route('blog.article.show', ['slug' => $blogArticle->slug]) }}">
                    <h1>{{ $blogArticle->title }}</h1>
                </a>
                <div class="flex mb-16 align-center">
                    {{-- @foreach ($blogArticle->tags as $tag)
                        <span class="tag mr-8">{{ $tag->name }}</span>
                    @endforeach --}}
                    <div class="publish-date">
                        <span>publicat pe {{ \Carbon\Carbon::parse($blogArticle->created_at)->format('j.m.Y') }}</span>
                    </div>
                </div>
                <div class="flex grid grid-5">
                    <div class="flex justify-center hide-mobile pr-32">
                        @php
                            $blogImageUrl = $blogArticle->featuredImage ? asset('storage/' . $blogArticle->featuredImage->path) : '/images/default-placeholder.png';
                        @endphp
                        <img class="w-full" src="{{ $blogImageUrl }}" alt="">
                    </div>
                    <div class="col-span-4 pl-16 flex col justify-center">
                        <span>
                            {{ \Illuminate\Support\Str::words(html_entity_decode(strip_tags($blogArticle->body)), 50, '...') }}
                        </span>
                        <a href="{{ route('blog.article.show', ['slug' => $blogArticle->slug]) }}" class="link">Vezi mai mult</a>
                    </div>
                </div>
            </div>
            @if ($key < count($blogArticles) - 1)
                <hr>
            @endif
        @endforeach

        @if ($blogArticles->isEmpty())
            <h2 class="mt-16">Nu au fost găsite articole.</h2>
        @endif

        {{ $blogArticles->links() }}
    </div>
</div>
@endsection
