@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="page-header text-center">Agregar Nuevo DTE</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                {{ Form::open(['route'=>['dte.store'], 'method'=>'post', 'class'=>'form-horizontal']) }}

                <div class="form-group{{ $errors->has('nro_tel') ? ' has-error' : '' }}">
                    {{ Form::text('nro_tel', null, ['class'=>'form-control', 'placeholder'=>'Número teléfono']) }}
                    @if ($errors->has('nro_tel'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nro_tel') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('sim') ? ' has-error' : '' }}">
                    {{ Form::text('sim', null, ['class'=>'form-control', 'placeholder'=>'SIM']) }}
                    @if ($errors->has('sim'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sim') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('imei') ? ' has-error' : '' }}">
                    {{ Form::text('imei', null, ['class'=>'form-control', 'placeholder'=>'IMEI']) }}
                    @if ($errors->has('imei'))
                        <span class="help-block">
                            <strong>{{ $errors->first('imei') }}</strong>
                        </span>
                    @endif
                </div>

                {{ Form::submit('Guardar', ['class'=>'btn btn-success pull-right']) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop