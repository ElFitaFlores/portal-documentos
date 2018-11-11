@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <input class="btn btn-primary" type="button" onclick="location.href='/documentos/create';" value="Crear" />
                    </div>

                    <div class="card-body">
                        <form action="">
                            <div class="form-group row">

                            </div>
                        </form>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No. Doc.</th>
                                    <th>Asunto</th>
                                    <th>Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $doc)
                                    <tr>
                                        <td>
                                            <a href="/documentos/{{$doc->id}}">{{$doc->no_doc}}</a>
                                        </td>
                                        <td>
                                            <a href="/documentos/{{$doc->id}}">{{$doc->asunto}}</a>
                                        </td>
                                        <td>
                                            <a href="/documentos/{{$doc->id}}">{{$doc->tipo}}</a>
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