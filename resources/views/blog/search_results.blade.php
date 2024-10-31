@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="/{{ minify('css/blog.css') }}">
@endsection

@section('content')
<div id="main" class="main-container">
    <div class="container">
        <h1>Rezultatele căutării</h1>
    </div>
    <div class="container" id="search_results2">
        <div id="search_results_row2">
            @if($results->isNotEmpty())
                @foreach ($results as $key => $result)
                    <div class="article">
                        <a href="{{ url('/blog/article', $result->id) }}">
                            <h1>{{ $result->title }}</h1>
                        </a>
                        <div class="flex mb-16 align-center">
                            @foreach ($result->tags as $tag)
                                <span class="tag mr-8">{{ $tag->name }}</span>
                            @endforeach
                            <span class="publish-date">publicat pe {{ \Carbon\Carbon::parse($result->created_at)->format('j.m.Y') }}</span>
                        </div>
                        <div class="flex grid grid-5">
                            <div class="flex justify-center hide-mobile pr-32">
                                @if ($result->featuredImage)
                                    <img class="w-full" src="{{ $result->featuredImage->url }}" alt="">
                                @endif
                            </div>
                            <div class="col-span-4 pl-16 flex col justify-center">
                                <span>
                                    {{ \Illuminate\Support\Str::words(strip_tags($result->body), 50, '...') }}
                                </span>
                                <a href="{{ url('/blog/article', $result->id) }}" class="link">Vezi mai mult</a>
                            </div>
                        </div>
                    </div>
                    @if ($key < $results->count() - 1)
                        <hr>
                    @endif
                @endforeach
            @else
                <div class="container">
                    <p>Nu au fost găsite articole.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
