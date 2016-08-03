@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-10 col-md-offset-1">
                <a href="{{ Route('moneys.create') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Agregar nuevo</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Nombre</th>
                        <th>Valor</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach($moneys as $money)
                        <tr>
                            <td>{{ $money->name }}</td>
                            <td>{{ $money->getHumanValue() }}</td>
                            <td>
                                <a href="{{ route('moneys.edit', $money) }}">Asignar en cajas</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@stop