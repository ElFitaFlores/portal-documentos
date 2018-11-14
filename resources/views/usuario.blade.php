@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Usuario</div>

                    <div class="card-body">
                        <form method="POST" action="/usuarios{{$id}}">
                            @if($id)
                                @method('PUT')
                            @endif

                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" required autofocus value="{{$usuario->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">Usuario</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" required value="{{$usuario->email}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label text-md-right">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type" class="col-sm-4 col-form-label text-md-right">Tipo</label>

                                <div class="col-md-6">
                                    <select name="type" id="type" class="form-control">
                                        <option value="admin" {{$usuario->type == 'admin' ? 'selected' : ''}}>Administrador</option>
                                        <option value="usuario"  {{$usuario->type == 'usuario' ? 'selected' : ''}}>Usuario</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1 offset-4">
                                    <input type="submit" class="btn btn-primary" value="Guardar">
                                </div>
                        </form>
                                @if($id && auth()->user()->id != $usuario->id)
                                <div class="col-md-1 offset-1">
                                    <form action="/usuarios/{{$usuario->id}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-danger" value="Borrar">
                                    </form>
                                </div>
                                @endif
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection