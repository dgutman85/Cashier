@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <dl class="dl-horizontal">
                    <dt>Fecha</dt>
                    <dd>{{ $report->created_at }}</dd>
                    <br>

                    <dt>Motivo</dt>
                    <dd>{{ $report->motive }}</dd>
                    <br>

                    <dt>Recorrido</dt>
                    <dd>{{ $report->recorrido }}</dd>
                    <br>

                    <dt>Billetes</dt>
                    <dd>
                        <table class="table">
                            <tr>
                                <th>Valor</th>
                                <th>Cantidad</th>
                            </tr>
                        @foreach($detail as $unit => $quantity)
                            @if($quantity > 0)
                                <tr>
                                    <td>{{ $monedas[$unit] }}</td>
                                    <td>{{ $quantity }}</td>
                                </tr>
                            @endif
                        @endforeach
                        </table>
                    </dd>
                    <br>
                    
                    <dt>Monto</dt>
                    <dd><strong>{{ $report->amount }}</strong></dd>
                </dl>
            </div>
        </div>
    </div>
@stop