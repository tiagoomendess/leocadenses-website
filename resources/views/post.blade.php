@extends('layouts.default')

@section('head')
    <title>{{ $post->title }}</title>

    <meta name="description" content="{{ $post->description }}">
    <meta name="keywords" content="{{ $post->meta_keywords }}">

    <meta property="og:title" content="{{ $post->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ route('post', ['slug' => $post->slug]) }}" />
    <meta property="og:image" content="{{ $post->image ? Voyager::image($post->image) : '/images/post_default.jpg' }}">
    <meta property="og:description" content="{{ $post->meta_description }}" />

@endsection

@section('body')
    <div class="container">
        @if($post->image)
            <img class="responsive-img materialboxed" src="{{ Voyager::image($post->image) }}" alt="{{ $post->title }}">
        @endif

        <h1>{{ $post->title }}</h1>

        {!! $post->body !!}

        <script>
            $(document).ready(function () {
                $('.materialboxed').materialbox();
            });
        </script>
    </div>
@endsection
