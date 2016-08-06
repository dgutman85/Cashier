@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Tipo</th>
                        <th>Motivo</th>
                        <th>Monto</th>
                        <th>Responsable</th>
                        <th>Fecha</th>
                    </tr>
                    @foreach($reports as $report)
                        <tr>
                            <td>{{ $report->type }}</td>
                            <td>{{ $report->motive }}</td>
                            <td>{{ $report->amount }}</td>
                            <td>{{ $report->responsable }}</td>
                            <td>{{ \Carbon\Carbon::parse($report->created_at)->format('d/m/y - H:i:s') }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@stop