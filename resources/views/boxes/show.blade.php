@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $box->name }}</div>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Valor</th>
                            <th>Cantidad</th>
                            <th>SubTotal</th>
                        </tr>
                        @foreach($box->money as $money)
                        <tr>
                            <td>{{ $money->name }}</td>
                            <td>{{ $money->pivot->quantity }}</td>
                            <td>{{ $money->value * $money->pivot->quantity }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <th colspan="2">Total</th>
                            <th>
                                ${{ $box->money->sum(function($money){ return $money->value * $money->pivot->quantity; }) }}
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop