@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-10 col-md-offset-1">
                <a href="{{ Route('dte.create') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Agregar nuevo</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Nro Tel</th>
                        <th>Sim</th>
                        <th>Imei</th>
                        <th>Acciones</th>
                    </tr>
                    @if ($dtes->count() > 0)
                        @foreach($dtes as $dte)
                            <tr>
                                <td>{{ $dte->nro_tel }}</td>
                                <td>{{ $dte->sim }}</td>
                                <td>{{ $dte->imei }}</td>
                                <td>
                                    <a href="{{ route('dte.edit', $dte) }}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" align="center">No se encontraron equipos</td>
                        </tr>
                    @endif

                </table>
            </div>
        </div>
    </div>
@stop