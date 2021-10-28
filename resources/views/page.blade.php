@extends('layouts.default')

@section('head')
    <title>{{ setting('site.title') }} :: {{ $page->title }}</title>
@endsection

@section('body')
    <div class="container">
        <h1>{{ $page->title }}</h1>

        {!! $page->body !!}
    </div>
@endsection

