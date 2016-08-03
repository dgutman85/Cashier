@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="page-header text-center">Selecciones las cajas para {{ ucfirst($money->name) }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                {{ Form::model($money, ['route'=>['moneys.update', $money], 'method'=>'put']) }}

                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                    <label for="role">Seleccione cajas</label>
                    {{ Form::select('boxes[]', $boxes, $money->box->pluck('id')->all(), ['class'=>'form-control select2', 'multiple']) }}
                    @if ($errors->has('role'))
                        <span class="help-block">
                            <strong>{{ $errors->first('role') }}</strong>
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