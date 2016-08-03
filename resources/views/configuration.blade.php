@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Panel de control</div>

                <div class="panel-body" style="font-size: 120%;">
                    <a class="label label-primary" href="{{ route('money.index') }}">Valores de caja</a>
                    <a class="label label-primary" href="{{ route('users.index') }}">Usuarios del sistema</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
