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
                <a href="{{ route('blog.article.show', ['slug' => $blogArticle->slug]) }}">
                    <h1 class="article-blog">{{ $blogArticle->title }}</h1>
                </a>
                <div class="flex mb-16 align-center">
                    <div class="publish-date">
                        <span>publicat pe {{ \Carbon\Carbon::parse($blogArticle->created_at)->format('j.m.Y') }}</span>
                    </div>
                </div>
                <div class="flex grid grid-3">
                    <div class="flex justify-center hide-mobile pr-32">
                        @php
                            $blogImageUrl = $blogArticle->featuredImage ? asset('storage/' .$blogArticle->featuredImage->path) : $baseUrl . '/images/default-placeholder.png';
                        @endphp
                         <a href="{{ route('blog.article.show', ['slug' => $blogArticle->slug]) }}">
                            <img class="w-full" src="{{ $blogImageUrl }}" alt="">
                        </a>
                    </div>
                    <div class="col-span-2 pl-16 flex col justify-center">
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
            <h2 class="mt-16"> Nu au fost găsite articole. </h2>
        @endif

        <ul class="row align-center justify-center pagination gap-md">
            <li>
                <form method="get" action="{{ url()->current() }}">
                    @csrfWithoutAutocomplete
                    <button aria-label="Inapoi" type="submit" {{ $blogArticles->currentPage() <= 1 ? 'disabled' : '' }} value="{{ $blogArticles->currentPage() - 1 }}" name="page">
                        <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.4716 3.52858C10.7319 3.78892 10.7319 4.21103 10.4716 4.47138L6.94297 7.99998L10.4716 11.5286C10.7319 11.7889 10.7319 12.211 10.4716 12.4714C10.2112 12.7317 9.78911 12.7317 9.52876 12.4714L5.52876 8.47138C5.26841 8.21103 5.26841 7.78892 5.52876 7.52858L9.52876 3.52858C9.78911 3.26823 10.2112 3.26823 10.4716 3.52858Z" />
                        </svg>
                    </button>
                </form>
            </li>
            @for ($i = max(1, $blogArticles->currentPage() - 2); $i <= min($blogArticles->lastPage(), $blogArticles->currentPage() + 3); $i++)
                <li>
                    <form method="get" action="{{ url()->current() }}">
                        @csrfWithoutAutocomplete
                        <button class="{{ $i == $blogArticles->currentPage() ? 'active' : '' }}" type="submit" value="{{ $i }}" name="page" aria-label="Pagina {{ $i }}">
                            {{ $i }}
                        </button>
                    </form>
                </li>
            @endfor
            <li>
                <p class="all-pages">
                    din {{ $blogArticles->lastPage() }}
                </p>
            </li>
            <li>
                <form method="get" action="{{ url()->current() }}">
                    @csrfWithoutAutocomplete
                    <button aria-label="Inainte" type="submit" {{ $blogArticles->currentPage() >= $blogArticles->lastPage() ? 'disabled' : '' }} value="{{ $blogArticles->currentPage() + 1 }}" name="page">
                        <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.52876 3.52857C5.78911 3.26823 6.21122 3.26823 6.47157 3.52857L10.4716 7.52858C10.7319 7.78891 10.7319 8.21105 10.4716 8.47138L6.47157 12.4714C6.21122 12.7317 5.78911 12.7317 5.52876 12.4714C5.26841 12.211 5.26841 11.7889 5.52876 11.5286L9.05736 7.99998L5.52876 4.47139C5.26841 4.21103 5.26841 3.78893 5.52876 3.52857Z" />
                        </svg>
                    </button>
                </form>
            </li>
        </ul>

    </div>

</div>
@endsection
