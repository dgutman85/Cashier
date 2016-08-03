@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="page-header text-center">Ajustando caja {{ ucfirst($box->name) }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                {{ Form::model($box, ['route'=>['boxes.update', $box], 'method'=>'put']) }}


                @foreach($box->money as $money)
                    <div class="form-group">
                        <label for="{{ $money->id }}">{{ $money->name }}</label>
                        {{ Form::text('money_id['.$money->id.']', $money->pivot->quantity, ['class'=>'form-control input-sm']) }}
                    </div>
                @endforeach

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