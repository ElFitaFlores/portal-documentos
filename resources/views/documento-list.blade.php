@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <input class="btn btn-primary" type="button" onclick="location.href='/documentos/create';" value="Crear" />
                    </div>

                    <div class="card-body">
                        <form action="">
                            <div class="form-group row">
                                <div class="col-md-5 offset-1">
                                    <label for="no_doc" class="col-sm-4 col-form-label text-md-left">No. Doc.</label>
                                    <input type="text" id="no_doc" name="no_doc" class="form-control">
                                </div>
                                <div class="col-md-5">
                                    <label for="no_doc" class="col-sm-4 col-form-label text-md-left">Tipo</label>
                                    <select name="tipo" id="tipo" class="form-control">
                                        <option value="">Todos</option>
                                        <option value="Oficio">Oficio</option>
                                        <option value="Expediente">Expediente</option>
                                        <option value="Carta">Carta</option>
                                        <option value="Memo">Memo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-5 offset-1">
                                    <label for="date_from" class="col-sm-4 col-form-label text-md-left">Fecha desde</label>
                                    <input type="date" class="form-control" name="date_from">
                                </div>
                                <div class="col-md-5">
                                    <label for="date_from" class="col-sm-4 col-form-label text-md-left">Fecha hasta</label>
                                    <input type="date" class="form-control" name="date_to">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-5 offset-1">
                                    <label for="cliente" class="col-sm-4 col-form-label text-md-left">Cliente</label>
                                    <select name="cliente" id="cliente" class="form-control">
                                        <option value="">Todos</option>
                                        @foreach($clientes as $cliente)
                                            <option value="{{$cliente->id}}">{{$cliente->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <br>
                                    <input type="submit" class="btn btn-primary" value="Buscar" required>
                                </div>
                            </div>
                        </form>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No. Doc.</th>
                                    <th>Asunto</th>
                                    <th>Descripción</th>
                                    <th>Fecha</th>
                                    <th>Tipo</th>
                                    <th>Cliente</th>
                                    <th>Documento</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(auth()->user()->type == 'admin')
                                @foreach($data as $doc)
                                    <tr>
                                        <td>
                                            <a href="/documentos/{{$doc->id}}">{{$doc->no_doc}}</a>
                                        </td>
                                        <td>
                                            <a href="/documentos/{{$doc->id}}">{{$doc->asunto}}</a>
                                        </td>
                                        <td>
                                            <a href="/documentos/{{$doc->id}}">{{$doc->descripcion}}</a>
                                        </td>
                                        <td>
                                            <a href="/documentos/{{$doc->id}}">{{$doc->fecha}}</a>
                                        </td>
                                        <td>
                                            <a href="/documentos/{{$doc->id}}">{{$doc->tipo}}</a>
                                        </td>
                                        <td>
                                            <a href="/documentos/{{$doc->id}}">{{$doc->cliente->name}}</a>
                                        </td>
                                        <td>
                                            <a href="{{$doc->archivo}}">Descargar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                @foreach($data as $doc)
                                    <tr>
                                        <td>
                                            {{$doc->no_doc}}
                                        </td>
                                        <td>
                                            {{$doc->asunto}}
                                        </td>
                                        <td>
                                            {{$doc->descripcion}}
                                        </td>
                                        <td>
                                            {{$doc->fecha}}
                                        </td>
                                        <td>
                                            {{$doc->tipo}}
                                        </td>
                                        <td>
                                            {{$doc->cliente->name}}
                                        </td>
                                        <td>
                                            <a href="{{$doc->archivo}}">Descargar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection