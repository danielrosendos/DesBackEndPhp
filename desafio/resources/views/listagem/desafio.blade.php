@extends('layouts.app')
@section('content')

<h1 class="text-center">Listagem Desafio</h1>

<table class="table table-striped table-bordered table-hover">

    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Prazo</th>
            <th scope="col">Prioridade</th>
            <th scope="col">Conclusão</th>
            @if(Auth::user()->isAdmin == 1)
            <th scope="col">Att Status</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($desafio as $c)
        <tr>
            <td>{{ $c->id }} </td>
            <td>{{ $c->nome }} </td>
            <td>{{ $c->descricao }} </td>
            <td>{{ date('d/m/Y', strtotime($c->prazo)) }} </td>
            <td>{{ $c->prioridade }} </td>
            <td>
                <spam class="{{ $c->concluida == 0 ? 'badge badge-warning' : 'badge badge-success' }}">{{ $c->concluida
                    == 0 ? 'Não Concluida' : 'Concluida' }}</spam>
            </td>
            @if(Auth::user()->isAdmin == 1)
            <td>
                <a href="{{ action('DesafioController@attStatus', $c->id) }}">
                    <spam class="badge badge-light">Atualizar</spam>
                </a>
            </td>
            <td>
                <a href="{{ action('DesafioController@addTask', $c->id) }}">
                    <spam class="badge badge-light">Editar</spam>
                </a>
            </td>
            <td>
                <a href="{{ action('DesafioController@deletar', $c->id) }}">
                    <spam class="badge badge-light">Deletar</spam>
                </a>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>

<div align="center" class="pt-3">
    <div class="container">
        <div class="col-md-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-info">
                    {{ $desafio->links() }}
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection