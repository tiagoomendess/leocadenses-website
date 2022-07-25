@extends('layouts.default')

@section('head')
    <title>{{ setting('site.title') }} - Verificação</title>
    <meta name="description" content="Verificação do Cartão de Sócio">
@endsection

@section('body')
    <main style="">
        <h1 class="hide">{{ setting('site.title') }} - Verificação</h1>

        <div class="container center" style="">
            <div class="row">
                @if ($member && $member->isValid())
                    <br/>
                    <h2 class="green-text">Cartão Válido</h2>
                    <table class="">
                        <tr>
                            <td style="width: 50%" class="right-align"><b>Número</b></td>
                            <td style="width: 50%">{{ $member->number }}</td>
                        </tr>
                        @can('browse', $member)
                            <tr>
                                <td style="width: 50%" class="right-align"><b>Nome</b></td>
                                <td style="width: 50%">{{ $member->name }}</td>
                            </tr>

                            <tr>
                                <td style="width: 50%" class="right-align"><b>Telefone</b></td>
                                <td style="width: 50%">{{ $member->phone }}</td>
                            </tr>

                            <tr>
                                <td style="width: 50%" class="right-align"><b>Email</b></td>
                                <td style="width: 50%">{{ $member->email }}</td>
                            </tr>
                        @endcan
                        <tr>
                            <td class="right-align" style="width: 50%"><b>Quotas</b></td>
                            <td style="width: 50%">
                                @foreach($member->quotas as $quota)
                                    @php($strs[] = $quota->name)
                                @endforeach
                                {{ implode(', ', isset($strs) ? $strs : ['Nenhuma']) }}


                            </td>
                        </tr>


                    </table>

                    @if(!$member->hasAllQuotasPaid())
                        <p class="flow-text red-text center">Sócio com Quotas em atraso</p>
                    @endif
                    <br/>

                @else
                    <br/>
                    <h2 class="red-text">Cartão Inválido</h2>
                    <br/>
                    <p class="flow-text">Se acredita que isto é um erro, por favor contacte a Direção do Clube</p>
                @endif
            </div>

            <div class="row center">
                <a style="margin-top: 10px" href="/" class="waves-effect waves-light btn-large green">Ir para o Site</a>
                @if($member)
                    @can('edit', $member)
                        <a style="margin-top: 10px" href="{{ route('voyager.members.edit', ['id' => $member->id]) ?? '#' }}"
                           class="waves-effect waves-light btn-large orange">ficha de sócio</a>
                    @endcan
                @endif
            </div>
            <br/>
            <br/>
            <br/>
        </div>

    </main>

@endsection
