@extends('layouts.default')

@section('head')
    <title>{{ setting('site.title') }}</title>
    <meta name="description" content="Website oficial do Leocadenses. Clube amador de Tamel Santa Leocádia em Barcelos. A competir desde 1987">
@endsection

@section('body')
    <main>
        <h1 class="hide">{{ setting('site.title') }}</h1>
        <div class="parallax-container">
            <div class="parallax"><img src="{{ setting('site.header_image') ? Voyager::image(setting('site.header_image')) : 'images/header.jpg' }}"></div>
        </div>

        @if($nextGame->has_game)
            <div class="container">
                <div class="row">
                    <div class="col s12 m12 l12 center" style="margin-bottom: 10px">
                        <h3 class="center" style="margin: 20px 0 10px 0">PRÓXIMO JOGO</h3>
                        <span style="" class="grey-text">{{ $nextGame->home_team }} vs {{ $nextGame->away_team }}</span>
                    </div>
                    <div class="col s6 m6">
                        <img class="right" style="width: 150px"
                             src="https://domingoasdez.com/{{ $nextGame->home_emblem }}"
                             alt="">
                    </div>
                    <div class="col s6 m6">
                        <img class="left" style="width: 150px"
                             src="https://domingoasdez.com/{{ $nextGame->away_team_emblem }}" alt="">
                    </div>
                    <div class="col s12 m12 center">
                        <p style="margin-bottom: 5px" class="flow-text center">{{ $nextGame->ground }}</p>
                        <span class="small grey-text">{{ $nextGame->date }}</span>
                    </div>
                </div>
            </div>

        @else
            <div class="container center" style="margin-top: 20px">
                <img style="width: 150px" src="{{ Voyager::image(setting('site.logo')) }}"
                     alt="{{setting('site.title')}}">
                <p class="flow-text center">Não existem jogos marcados para o futuro próximo</p>
            </div>
        @endif

        <div class="container">
            <div class="divider"></div>

            <div class="row center" style="margin-top: 20px">
                <a href="{{ route('member.application') }}" class="waves-effect waves-light btn-large green">Faça-se sócio</a>
            </div>

            <div class="divider"></div>
        </div>

        <div class="container" style="margin-top: 20px">
            @if($homePage)
                {!! $homePage->body !!}
            @endif
        </div>
    </main>

    <script>
        $(document).ready(function () {
            $('.parallax').parallax();
        });
    </script>
@endsection
