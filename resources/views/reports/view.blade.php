@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Detalle del reporte</div>
                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt class="text-danger">Fecha</dt>
                            <dd>{{ $report->created_at }}</dd>
                            <br>

                            <dt class="text-danger">Motivo</dt>
                            <dd>{{ $report->motive }}</dd>
                            <br>

                            <dt class="text-danger">Recorrido</dt>
                            <dd>{{ $report->recorrido }}</dd>
                            <br>

                            <dt class="text-danger">Detalle</dt>
                            <dd>
                                <table class="table table-bordered table-striped">
                                    <tr class="text-primary">
                                        <th>Valor</th>
                                        <th>Cantidad</th>
                                    </tr>
                                    @foreach($detail as $unit => $quantity)
                                        @if($quantity > 0)
                                            <tr>
                                                <td><strong>{{ $monedas[$unit] }}</strong></td>
                                                <td>{{ $quantity }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr class="text-primary">
                                        <th>Total</th>
                                        <th>
                                            <strong>${{ number_format($report->amount,2,',','.') }}</strong>
                                        </th>
                                    </tr>
                                </table>
                            </dd>
                        </dl>
                    </div>
                    <div class="panel-footer">
                        <a href="{{ url()->previous() }}" class="btn btn-default">Volver a la lista</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop