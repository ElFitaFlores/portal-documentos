@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cliente</div>

                    <div class="card-body">
                        <form method="POST" action="/clientes{{$id}}" id="itemForm">
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
                                <label for="descripcion" class="col-sm-4 col-form-label text-md-right">Descripción</label>

                                <div class="col-md-6">
                                    <input id="descripcion" type="text" class="form-control" name="descripcion" required value="{{$usuario->descripcion}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="direccion" class="col-sm-4 col-form-label text-md-right">Direccion</label>

                                <div class="col-md-6">
                                    <input id="direccion" type="text" class="form-control" name="direccion" required value="{{$usuario->direccion}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="contacto" class="col-sm-4 col-form-label text-md-right">Contacto</label>

                                <div class="col-md-6">
                                    <input id="contacto" type="text" class="form-control" name="contacto" required value="{{$usuario->contacto}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telefono" class="col-sm-4 col-form-label text-md-right">Telefono</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="text" class="form-control" name="telefono" required value="{{$usuario->telefono}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inicio_contrato" class="col-sm-4 col-form-label text-md-right">Inicio del contrato</label>

                                <div class="col-md-6">
                                    <input id="inicio_contrato" type="date" class="form-control" name="inicio_contrato" required value="{{$usuario->inicio_contrato}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="final_contrato" class="col-sm-4 col-form-label text-md-right">Final del contrato</label>

                                <div class="col-md-6">
                                    <input id="final_contrato" type="date" class="form-control" name="final_contrato" required value="{{$usuario->final_contrato}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="estado" class="col-sm-4 col-form-label text-md-right">Estado</label>

                                <div class="col-md-6">
                                    <select name="estado" id="estado" class="form-control">
                                        <option value="activo" {{$usuario->estado == 'activo' ? 'selected' : ''}}>Activo</option>
                                        <option value="inactivo" {{$usuario->estado == 'inactivo' ? 'selected' : ''}}>Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1 offset-4">
                                    <input type="submit" class="btn btn-primary" value="Guardar" form="itemForm">
                                </div>
                            </form>
                                @if($id)
                                <div class="col-md-1 offset-1">
                                    <form action="/clientes/{{$usuario->id}}" method="post">
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