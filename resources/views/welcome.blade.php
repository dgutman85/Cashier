@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if(!Auth::check())
                        Por favor inicia sesión para continuar en la aplicación
                    @else
                        @if(Auth::user()->active)
                        <p>
                            Hola {{ Auth::user()->name }}!
                        </p>
                        <p>
                            @if(!Auth::user()->box_id)
                                No tienes ninguna caja asociada aún!
                            @else
                                Estás actualmente asignado a la caja
                                <a href="{{ route('boxes.index', Auth::user()->id) }}">
                                    {{ \App\Box::where('id', Auth::user()->box_id)->get()[0]->name }}
                                </a>
                            @endif
                        </p>
                        @else
                            <p>
                                Hola {{ Auth::user()->name }}!
                            </p>
                            <p>
                                Debés esperar la aprobación de un usuario administrador para usar esta aplicación...
                            </p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
