@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="page-header text-center">Editando Posnet Sube: {{ ucwords($sube->id_pos) }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                {{ Form::model($sube, ['route'=>['sube.update', $sube], 'method'=>'put']) }}

                <div class="form-group{{ $errors->has('id_pos') ? ' has-error' : '' }}">
                    {{ Form::text('id_pos', $sube->id_pos, ['class'=>'form-control', 'placeholder'=>'Id Pos']) }}
                    @if ($errors->has('id_pos'))
                        <span class="help-block">
                            <strong>{{ $errors->first('id_pos') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('sn') ? ' has-error' : '' }}">
                    {{ Form::text('sn', $sube->sn, ['class'=>'form-control', 'placeholder'=>'S/N']) }}
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

@section('scripts')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
@stop