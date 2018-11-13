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
                                <div class="col-md-5">
                                    <label for="usuario" class="col-sm-4 col-form-label text-md-right">Usuario</label>
                                    <select name="usuario" id="usuario" class="form-control">
                                        <option value="" selected>Todos</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label for="no_doc" class="col-sm-4 col-form-label text-md-right">Tipo</label>
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
                                <div class="col-md-5">
                                    <label for="date_from" class="col-sm-4 col-form-label text-md-right">Fecha desde</label>
                                    <input type="date" class="form-control" name="date_from">
                                </div>
                                <div class="col-md-5">
                                    <label for="date_from" class="col-sm-4 col-form-label text-md-right">Fecha hasta</label>
                                    <input type="date" class="form-control" name="date_to">
                                </div>
                                <div class="col-md-2">
                                    <br>
                                    <input type="submit" class="btn btn-primary" value="Buscar" required>
                                </div>
                            </div>
                        </form>
                        <table class="table table-striped table-bordered" id="tblDoc">
                            <thead>
                                <tr>
                                    <th>No. Doc.</th>
                                    <th>Asunto</th>
                                    <th>Descripción</th>
                                    <th>Fecha</th>
                                    <th>Tipo</th>
                                    <th>Usuario</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                        {{$doc->user->name}}
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
    <script>
        $(document).ready( function () {
            $('#tblDoc').DataTable({
                'searching': false,
                'paging': false,
                dom: 'Bfrtip',
                buttons: [
                    'excelHtml5',
                    'pdfHtml5'
                ]
            });
        } );
    </script>
@endsection