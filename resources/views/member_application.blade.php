@extends('layouts.default')

@section('head')
    <title>{{ setting('site.title') }} - Novo Sócio</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="{{ setting('site.title') }} - Novo Sócio" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{ setting('site.logo') }}">

    <meta name="description" content="Inscreva-se como sócio do Leocadenses">

    {!! \Biscolab\ReCaptcha\Facades\ReCaptcha::htmlScriptTagJsApi() !!}
@endsection

@section('body')
    <main>
        <h1 class="hide">{{ setting('site.title') }} - Novo Sócio</h1>
        <div class="container" style="margin-top: 10px">
            @if(!empty($page))
                {!! $page->body !!}
            @endif

            @if(Cookie::get('member_application_submitted'))
                <div class="center">
                    <p class="flow-text green-text">
                        Recebemos o teu pedido e vamos processa-lo o mais rápido possível.
                        Obrigado pelo interesse em fazer parte do clube!
                    </p>
                    <a href="/" class="waves-effect waves-light btn-large green">Ir para o Início</a>
                    <br/>
                    <br/>
                </div>
            @else
                <div>
                    @if($errors->any())
                        <div class="row" style="margin-bottom: 0">
                            <div class="col s12">
                                <p class="red-text">Algo correu mal</p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                </div>

                <div class="row">
                    <form action="{{ route('member.application.store') }}" method="POST" class="col s12">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="nome" required id="name" type="text" class="validate"
                                       value="{{ old('nome') }}">
                                <label for="name">Nome Completo</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input name="telefone" required id="phone" type="number" class="validate"
                                       value="{{ old('telefone') }}">
                                <label for="phone">Nº Telemovel</label>
                            </div>

                            <div class="input-field col s12 m6">
                                <input name="email" required id="email" type="text" class="validate"
                                       value="{{ old('email') }}">
                                <label for="email">Email</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s2">
                                <select required name="document_type">
                                    @foreach(\App\DocumentType::all() as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                <label></label>
                            </div>

                            <div class="input-field col s10">
                                <input required name="documento" id="document" type="text" class="validate"
                                       value="{{ old('documento') }}">
                                <label for="document">Documento</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <p>
                                    <label>
                                        <input name="authorization" required
                                               type="checkbox" {{ old('authorization') ? 'checked' : '' }}/>
                                        <span>Autorizo o processamento dos meus dados pessoais para os efeitos acima mencionados</span>
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                @csrf
                                {!!  ReCaptcha::htmlFormSnippet()  !!}
                            </div>
                        </div>

                        <button type="submit" class="waves-effect waves-light btn"><i
                                class="material-icons right">send</i>Quero ser sócio
                        </button>

                    </form>
                </div>
            @endif


        </div>
    </main>

    <script>

        $(document).ready(function () {
            M.updateTextFields();
            $('select').formSelect();
            $('.datepicker').datepicker();
        });

    </script>
@endsection
