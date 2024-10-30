@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="{{ minify('css/blog.css') }}">
@endsection

@section('breadcrumbs')
<ul class="flex gap-xs"><li class="font-xs"><a href="/">Acasa</a></li><li class="separator">/</li><li class="font-xs -ml-4 ellipsis">Blog</li></ul>
@endsection

@section('content')

<div id="content">

    <div class="hidden-xs">
        <div class="top_header_image_bg">
            <div class="col justify-center align-center" id="blog_header" style="background: url('{{ asset('resources/images/blog/blog-background.jpg') }}'); height: 146px;">
                <h1 class="z-10">
                    EMEX BLOG
                </h1>
            </div>
        </div>
    </div>

    <div class="main-container">
        @if (!empty($archive))
            @php
                $monthNames = ['ianuarie', 'februarie', 'martie', 'aprilie', 'mai', 'iunie', 'iulie', 'august', 'septembrie', 'octombrie', 'noiembrie', 'decembrie'];
            @endphp
            <h2 class="mt-32">Arhiva - {{ $monthNames[$archive['month'] - 1] }} {{ $archive['year'] }}</h2>
        @elseif (!empty($tagFilter))
            <h2 class="flex align-center mt-32">Articole cu tagul <span class="tag ml-8">{{ $tagFilter['name'] }}</span></h2>
        @endif

        @foreach ($blogArticles as $key => $blogArticle)
            <div class="article">
                <a href="{{ url('/blog/article', $blogArticle->id) }}">
                    <h1>{{ $blogArticle->title }}</h1>
                </a>
                <div class="flex mb-16 align-center">
                    @foreach ($blogArticle->tags as $tag)
                        <span class="tag mr-8">{{ $tag->name }}</span>
                    @endforeach
                    <span class="publish-date">publicat pe {{ \Carbon\Carbon::parse($blogArticle->created_at)->format('j.m.Y') }}</span>
                </div>
                <div class="flex grid grid-5">
                    <div class="flex justify-center hide-mobile pr-32">
                        {{-- <img class="w-full" src="{{ $blogArticle->featuredImage->url }}" alt=""> --}}
                    </div>
                    <div class="col-span-4 pl-16 flex col justify-center">
                        <span>
                            {{ \Illuminate\Support\Str::words(html_entity_decode(strip_tags($blogArticle->body)), 50, '...') }}
                            {{-- {!! \Illuminate\Support\Str::words($blogArticle->body, 50, '...') !!} --}}
                        </span>
                        {{-- <a href="{{ url('/blog/article', $blogArticle->id) }}" class="link">Vezi mai mult</a> --}}
                        <a href="{{ route('blog.article.show', ['slug' => $blogArticle->slug]) }}" class="link">Vezi mai mult</a>
                    </div>
                </div>
            </div>
            @if ($key < count($blogArticles) - 1)
                <hr>
            @endif
        @endforeach

        @if ($blogArticles->isEmpty())
            <h2 class="mt-16"> Nu au fost găsite articole. </h2>
        @endif

        <!-- Paginare -->
        {{ $blogArticles->links() }}
    </div>

</div>
@endsection
