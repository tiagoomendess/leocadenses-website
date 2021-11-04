@extends('layouts.default')

@section('head')
    <title>{{ setting('site.title') }} :: Notícias</title>
    <meta name="description" content="Últimas noticias sobre o Leocadenses">
@endsection

@section('body')
    <div class="container">
        <h1 class="hide">{{ setting('site.title') }} :: Notícias</h1>
        <div class="row">
            @foreach($posts as $post)
                <div class="col s12 l8 offset-l2">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{ $post->image ? Voyager::image($post->image) : '/images/post_default.jpg' }}">
                            <span class="card-title"
                                  style="text-shadow: #070707 2px 2px 2px; background-color: rgba(0,0,0,0.3); width: 100%">{{ $post->title }}</span>
                        </div>
                        <div class="card-content">
                            <p>{{ $post->meta_description }}</p>
                        </div>
                        <div class="card-action right-align">
                            <a href="{{ route('post', ['slug' => $post->slug]) }}">Saber Mais</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {!! $posts->links('vendor.pagination.materialize') !!}

    </div>
@endsection
