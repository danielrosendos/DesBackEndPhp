@extends('layouts.app')
@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>@foreach ($errors->all() as $error)
        <li>{{ $error }}</li> @endforeach
    </ul>
</div>
@endif
@if(!($errors->has('email')) and !($errors->has('prazo')) and old('name'))
<div class="alert alert-success">
    <strong>Sucesso!</strong> A tarefa foi adicionada ou atualizada corretamente
</div>
@endif
<div class="card-header">{{ __('Registar Novo Tarefa') }}</div>
<div class="card-body">
    <form method="post" class="form" action="{{ action('DesafioController@add', empty($l->id) ? 0 : $l->id) }}"
        aria-label="{{ __('Register') }}">
        @csrf

        <div class="form-group row">
            <label for="nome" class="col-md-4 col-form-label text-md-right" require>{{ __('Nome') }}</label>

            <div class="col-md-6">
                <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome"
                    value="{{ empty($l->id) ?  '' : $l->nome }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="descricao" class="col-md-4 col-form-label text-md-right" require>{{ __('Descrição')}}</label>

            <div class="col-md-6">
                <input id="descricao" type="text" class="form-control{{ $errors->has('descricao') ? ' is-invalid' : '' }}"
                    name="descricao" value="{{ empty($l->id) ?  old('descricao') : $l->descricao }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="prazo" class="col-md-4 col-form-label text-md-right" require>{{ __('Prazo') }}</label>

            <div class="col-md-6">
                <input id="prazo" type="date" class="form-control" name="prazo" value="{{ empty($l->id) ?  old('prazo') : $l->prazo }}"
                    required>
            </div>
        </div>

        <div class="form-group row">
            <label for="prioridade" class="col-md-4 col-form-label text-md-right" require>{{ __('Prioridade')}}</label>

            <div class="col-md-6">
                <select class="form-control" id="prioridade" type="text" name="prioridade" required autofocus>
                    <option>Baixa</option>
                    <option>Média</option>
                    <option>Alta</option>
                </select>
            </div>
        </div>

        <div class="form-group mb-0" align="right">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-info">
                    {{ __('Registrar') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection