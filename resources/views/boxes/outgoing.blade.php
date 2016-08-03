@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2 class="page-header">Salida</h2>
                {{ Form::model($box, ['route'=>['outgoing', $box], 'method'=>'put']) }}

                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Valor</th>
                        <th>Cantidad</th>
                        <th>SubTotal</th>
                    </tr>
                    @foreach($box->money as $money)
                        <tr class="money-row" data-value="{{ $money->value }}">
                            <td>{{ $money->name }}</td>
                            <td>{{ Form::number('money_id['.$money->id.']', null, ['class'=>'form-control input-sm quantity', 'max'=>$money->pivot->quantity, 'placeholder'=>'Tienes: '.$money->pivot->quantity]) }}</td>
                            <td data-subtotal="" class="subtotal">Subtotal</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="2">Total</th>
                        <th class="total"></th>
                    </tr>
                </table>


                {{ Form::submit('Confirmar salida', ['class'=>'btn btn-success']) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('js/select2.min.js') }}"></script>
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
                calculate();
            }
        });

        function calculate() {
            var sum = 0;
            $('.subtotal').each(function() {
                sum += Number($(this).attr('data-subtotal'));
            });
            if (sum > 0) {
                $('.total').html('$' + sum);
            } else {
                $('.total').html('$' + 0);
            }
        }
    </script>
@stop