@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-10 col-md-offset-1">
                <a href="{{ Route('sube.create') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Agregar nuevo</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Id Pos</th>
                        <th>S/N</th>
                        <th>Acciones</th>
                    </tr>
                    @if ($subes->count() > 0)
                        @foreach($subes as $sube)
                            <tr>
                                <td>{{ $sube->id_pos }}</td>
                                <td>{{ $sube->sn }}</td>
                                <td>
                                    <a href="{{ route('sube.edit', $sube) }}">Editar</a>
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