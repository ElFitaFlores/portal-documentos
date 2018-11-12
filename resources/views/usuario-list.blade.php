@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <input class="btn btn-primary" type="button" onclick="location.href='/usuarios/create';" value="Crear" />
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Usuario</th>
                                    <th>Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $user)
                                    <tr>
                                        <td>
                                            <a href="/usuarios/{{$user->id}}">{{$user->name}}</a>
                                        </td>
                                        <td>
                                            <a href="/usuarios/{{$user->id}}">{{$user->email}}</a>
                                        </td>
                                        <td>
                                            <a href="/usuarios/{{$user->id}}">{{$user->type}}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection