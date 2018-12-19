@extends('layouts.app')
@section('content')
<div class="page-header">
    <div class="container">
        <div class="col-md-4 content-center mt-5 ">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error)
                    <li>{{ $error }}</li> @endforeach
                </ul>
            </div>
            @endif 
            @if(!($errors->has('email')) and !($errors->has('fim')) and old('name'))
            <div class="alert alert-success">
                <strong>Sucesso!</strong> O Aluno foi Adicionado/Atualizado corretamente
            </div>
            @endif
            <div class="card-header">{{ __('Registar Novo Aluno') }}</div>
            <div class="card-body">
                <form method="post" class="form" action="{{ action('ControllerGB@adicionar', empty($l->id) ? 0 : $l->id) }}" aria-label="{{ __('Register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right" require>{{ __('Nome') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"  value="{{ empty($l->id) ?  '' : $l->name }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right" require>{{ __('Endereço de E-mail')
                            }}
                        </label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ empty($l->id) ?  old('email') : $l->email }}"
                                required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="curso" class="col-md-4 col-form-label text-md-right" require>{{ __('Curso') }}</label>

                        <div class="col-md-6">
                            <input id="curso" type="text" class="form-control{{ $errors->has('curso') ? ' is-invalid' : '' }}" name="curso" value="{{ empty($l->id) ?  old('curso') : $l->curso }}"
                                required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inicio" class="col-md-4 col-form-label text-md-right" require>{{ __('Data de Início')
                            }}
                        </label>

                        <div class="col-md-6">
                            <input id="inicio" type="date" class="form-control" name="inicio" value="{{ empty($l->id) ?  old('inicio') : $l->inicio }}"  required>
                        </div>
                    </div>

                    <div class="form-group row">

                        <label for="fim" class="col-md-4 col-form-label text-md-right" require>{{ __('Data de Termino') }}</label>

                        <div class="col-md-6">
                            <input id="fim" type="date" class="form-control{{ $errors->has('fim') ? ' is-invalid' : '' }}" name="fim" value="{{ empty($l->id) ?  old('fim') : $l->fim }}"
                                required>
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
        </div>
    </div>
</div>
@endsection