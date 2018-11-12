<?php

namespace App\Http\Controllers;

use App\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->input('no_doc') != "")
            $data = Documento::where('no_doc', $request->input('no_doc'))->get();
        elseif ($request->input('tipo') != "")
            $data = Documento::where('tipo', $request->input('tipo'))->get();
        else
            $data = Documento::all();

        return view('documento-list')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documento = (object) [
            'no_doc' => NULL,
            'asunto' => NULL,
            'descripcion' => NULL,
            'fecha' => NULL,
            'tipo' => NULL,
        ];
        return view('documento')->with(['documento' => $documento, 'id' => NULL]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $documento = new Documento();
        $documento->no_doc = $request->input('no_doc');
        $documento->asunto = $request->input('asunto');
        $documento->descripcion = $request->input('descripcion');
        $documento->fecha = $request->input('fecha');
        $documento->tipo = $request->input('tipo');
        $documento->archivo = $request->file('archivo')->store('public');
        $documento->save();

        return redirect('documentos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documento = Documento::find($id);
        $path = Storage::url($documento->archivo);
        return view('documento')->with(['documento' => $documento, 'id' => '/'.$id, 'path' => $path]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $documento = Documento::find($id);
        $documento->no_doc = $request->input('no_doc');
        $documento->asunto = $request->input('asunto');
        $documento->descripcion = $request->input('descripcion');
        $documento->fecha = $request->input('fecha');
        $documento->tipo = $request->input('tipo');
        $documento->save();

        return redirect('documentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
