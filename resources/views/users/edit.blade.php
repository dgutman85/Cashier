@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="page-header text-center">Asignar caja y permisos a {{ ucfirst($user->name) }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                {{ Form::model($user, ['route'=>['users.update', $user], 'method'=>'put']) }}

                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                    <label for="role">Permisos</label>
                    {{ Form::select('role', ['admin'=>'Administrador','user'=>'Usuario'], $user->role, ['class'=>'form-control', 'placeholder'=>'Seleccione permisos']) }}
                    @if ($errors->has('role'))
                        <span class="help-block">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="box">Caja</label>
                    {{ Form::select('box', $boxes, $user->box_id, ['class'=>'form-control', 'placeholder'=>'Seleccione una caja']) }}
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('active',1 ,$user->active) }} Activar usuario
                        </label>
                    </div>
                </div>

                {{ Form::submit('Guardar', ['class'=>'btn btn-success pull-right']) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop