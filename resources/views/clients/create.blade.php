@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="page-header text-center">Agregar Nuevo Cliente</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                {{ Form::open(['route'=>['clients.store'], 'method'=>'post', 'class'=>'form-horizontal']) }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Indique un nombre']) }}
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('post') ? ' has-error' : '' }}">
                    {{ Form::text('post', null, ['class'=>'form-control', 'placeholder'=>'Indique el puesto']) }}
                    @if ($errors->has('post'))
                        <span class="help-block">
                            <strong>{{ $errors->first('post') }}</strong>
                        </span>
                    @endif
                </div>

                {{ Form::submit('Guardar', ['class'=>'btn btn-success pull-right']) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop