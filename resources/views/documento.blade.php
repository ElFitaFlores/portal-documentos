@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Carga de documentos</div>

                    <div class="card-body">
                        <form method="POST" action="/documentos{{$id}}" enctype="multipart/form-data">
                            @if($id)
                                @method('PUT')
                            @endif

                            @csrf
                            <div class="form-group row">
                                <label for="no_doc" class="col-sm-4 col-form-label text-md-right">No. Doc.</label>

                                <div class="col-md-6">
                                    <input id="no_doc" type="text" class="form-control" name="no_doc" required autofocus value="{{$documento->no_doc}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="asunto" class="col-sm-4 col-form-label text-md-right">Asunto</label>

                                <div class="col-md-6">
                                    <input id="asunto" type="text" class="form-control" name="asunto" required value="{{$documento->asunto}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descripcion" class="col-sm-4 col-form-label text-md-right">Descripción</label>

                                <div class="col-md-6">
                                    <input id="descripcion" type="text" class="form-control" name="descripcion" required  value="{{$documento->descripcion}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fecha" class="col-sm-4 col-form-label text-md-right">Fecha recibido</label>

                                <div class="col-md-6">
                                    <input id="fecha" type="date" class="form-control" name="fecha" required  value="{{$documento->fecha}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tipo" class="col-sm-4 col-form-label text-md-right">Tipo documento</label>

                                <div class="col-md-6">
                                    <select name="tipo" id="tipo" class="form-control">
                                        <option value="Oficio">Oficio</option>
                                        <option value="Expediente" {{$documento->tipo == 'Expediente' ? 'selected' : ''}}>Expediente</option>
                                        <option value="Carta"  {{$documento->tipo == 'Carta' ? 'selected' : ''}}>Carta</option>
                                        <option value="Memo"  {{$documento->tipo == 'Memo' ? 'selected' : ''}}>Memo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="archivo" class="col-sm-4 col-form-label text-md-right">PDF</label>

                                <div class="col-md-6">
                                    @if($id)
                                        <a href="{{$path}}" class="btn btn-secondary">Descargar</a>
                                    @else
                                        <input id="archivo" type="file" class="form-control-file" name="archivo" required>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-5">
                                    <input type="submit" class="btn btn-primary" Value="Guardar" required>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection