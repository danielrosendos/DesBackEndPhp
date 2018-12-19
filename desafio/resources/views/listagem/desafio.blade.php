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
      <th scope="col">Conclusão</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($desafio as $c)
    <tr>
      <td>{{ $c->id }} </td>
      <td>{{ $c->nome }} </td>
      <td>{{ $c->descricao }} </td>
      <td>{{ $c->prazo }} </td>
      <td>{{ $c->concluida }} </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div align="center" class="pt-3">
    <div class="container">
        <div class="col-md-4">
            <div class="card card-login card-plain">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-info">
                       {{ $desafio->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection