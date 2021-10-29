@extends('layouts.default')

@section('head')
    <title>{{ setting('site.title') }} :: {{ $page->title }}</title>

    <meta name="description" content="{{ $page->meta_description }}">
    <meta name="keywords" content="{{ $page->meta_keywords }}">

    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('page', ['slug' => $page->slug]) }}" />
    <meta property="og:image" content="{{ $page->image ? Voyager::image($page->image) : setting('site.logo') }}">
    <meta property="og:description" content="{{ $page->meta_description }}" />
@endsection

@section('body')
    <div class="container">
        <h1>{{ $page->title }}</h1>

        {!! $page->body !!}
    </div>
@endsection
