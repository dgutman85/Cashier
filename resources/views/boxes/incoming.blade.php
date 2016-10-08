@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2 class="page-header">Entrada</h2>
                {{ Form::model($box, ['route'=>['incoming', $box], 'method'=>'put', 'id'=>'movement_form', 'onsubmit'=>"return confirm('Confirmar esta acción?')"]) }}

                <p>
                    <div class="row">
                        <div class="col-md-3 col-xs-4">{{ Form::text('motive', null, ['class'=>'form-control input-sm col-md-12', 'placeholder'=>'Indique motivo', 'required'=>'']) }}</div>
                        <div class="col-md-3 col-xs-4">{{ Form::text('recorrido', null, ['class'=>'form-control input-sm col-md-12', 'placeholder'=>'Indique recorrido']) }}</div>
                        <div class="col-md-6 col-xs-4 text-right">Fecha: {{ \Carbon\Carbon::now()->format('d/m/y') }}</div>
                    </div>
                </p>

                <table class="table table-bordered table-striped">
                    <tr class="text-danger">
                        <th>Valor</th>
                        <th>Cantidad</th>
                        <th>SubTotal</th>
                    </tr>
                    @foreach($box->money as $money)
                        <tr class="money-row" data-value="{{ $money->value }}">
                            <td><strong>{{ $money->name }}</strong></td>
                            <td>{{ Form::number('money_id['.$money->id.']', null, ['class'=>'form-control input-sm quantity', 'step'=>'any']) }}</td>
                            <td data-subtotal="" class="subtotal"></td>
                        </tr>
                    @endforeach
                    <tr class="text-danger">
                        <th colspan="2">Total</th>
                        <th class="total"></th>
                    </tr>
                </table>

                <input type="submit" class="btn btn-success">

                {{ Form::close() }}

            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('js/accounting.min.js') }}"></script>
    <script>
        $('.subtotal, .total').html('$' + 0);
        $('.quantity').keyup(function(){
            var row = $(this).parents('.money-row');
            var quantity = row.find('.quantity').val();
            var value = row.attr('data-value');
            var subtotal = row.find('.subtotal');
            if (quantity > 0) {
                subtotal.html('$' + quantity * value);
                subtotal.attr('data-subtotal', quantity * value);
                calculate();
            } else {
                subtotal.html('$' + 0);
                subtotal.attr('data-subtotal', quantity * value);
                calculate();
            }
        });

        function calculate() {
            var sum = 0;
            $('.subtotal').each(function() {
                sum += Number($(this).attr('data-subtotal'));
            });
            if (sum > 0) {
                $('.total').html('$'+accounting.formatNumber(sum,2,'.',','));
            } else {
                $('.total').html('$' + 0);
            }
        }

        $('#movement_form').on('submit', function(e){
            var sum = 0;
            $('.subtotal').each(function() {
                sum += Number($(this).attr('data-subtotal'));
            });
            if (sum <= 0) {
                e.preventDefault();
                alert('No se realizara un movimiento por $0');
            }
        });
    </script>
@stop
