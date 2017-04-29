@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="page-header text-center">Agregar Nuevo Posnet SUBE</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                {{ Form::open(['route'=>['sube.store'], 'method'=>'post', 'class'=>'form-horizontal']) }}

                <div class="form-group{{ $errors->has('id_pos') ? ' has-error' : '' }}">
                    {{ Form::text('id_pos', null, ['class'=>'form-control', 'placeholder'=>'Id Pos']) }}
                    @if ($errors->has('id_pos'))
                        <span class="help-block">
                            <strong>{{ $errors->first('id_pos') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('sn') ? ' has-error' : '' }}">
                    {{ Form::text('sn', null, ['class'=>'form-control', 'placeholder'=>'S/N']) }}
                    @if ($errors->has('sim'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sn') }}</strong>
                        </span>
                    @endif
                </div>

                {{ Form::submit('Guardar', ['class'=>'btn btn-success pull-right']) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop