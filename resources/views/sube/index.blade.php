@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-10 col-md-offset-1">
                <a href="{{ Route('clients.create') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Agregar nuevo</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Nombre</th>
                        <th>Puesto</th>
                        <th>Acciones</th>
                    </tr>
                    @if ($clients->count() > 0)
                        @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->post }}</td>
                                <td>
                                    <a href="{{ route('clients.edit', $client) }}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" align="center">No se encontraron clientes</td>
                        </tr>
                    @endif

                </table>
            </div>
        </div>
    </div>
@stop