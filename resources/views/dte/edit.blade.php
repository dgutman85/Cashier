@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="page-header text-center">Editando Imei: {{ ucwords($dte->imei) }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                {{ Form::model($dte, ['route'=>['dte.update', $dte], 'method'=>'put']) }}

                <div class="form-group{{ $errors->has('nro_tel') ? ' has-error' : '' }}">
                    {{ Form::text('nro_tel', $dte->nro_tel, ['class'=>'form-control']) }}
                    @if ($errors->has('nro_tel'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nro_tel') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('sim') ? ' has-error' : '' }}">
                    {{ Form::text('sim', $dte->sim, ['class'=>'form-control']) }}
                    @if ($errors->has('sim'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sim') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('imei') ? ' has-error' : '' }}">
                    {{ Form::text('imei', $dte->imei, ['class'=>'form-control']) }}
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

@section('scripts')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
@stop