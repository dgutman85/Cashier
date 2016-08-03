@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-10 col-md-offset-1">
                <a href="{{ Route('boxes.create') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Agregar nuevo</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach($boxes as $box)
                        <tr>
                            <td>{{ $box->name }}</td>
                            <td>
                                <a href="{{ route('boxes.edit', $box) }}">Ajustar caja</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@stop