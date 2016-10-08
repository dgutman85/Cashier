@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $box->name }}
                        <span class="pull-right">Fecha: {{ \Carbon\Carbon::now()->format('d/m/y') }}</span>
                    </div>
                    <div id="content"></div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        (function(){
            $('#content').load('table/{{ $box->id }}');
            function reload(){
                $('#content').load('table/{{ $box->id }}')
            }

            setInterval(reload, 1000);


        })();
    </script>
@stop