<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Documento;
use App\User;
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
        $data = Documento::query();

        if($request->input('no_doc') != "")
            $data->where('no_doc', $request->input('no_doc'));

        if ($request->input('tipo') != "")
            $data->where('tipo', $request->input('tipo'));

        if ($request->input('cliente') != "")
            $data->where('cliente_id', $request->input('cliente'));

        if($request->input('date_from') && $request->input('date_to'))
            $data->whereBetween('fecha', [$request->input('date_from'),$request->input('date_to')]);

        $data = $data->get();

        $data->transform(function($item, $key){
            $item->archivo = Storage::url($item->archivo);
            return $item;
        });

        return view('documento-list')->with(['data' => $data, 'clientes' => Cliente::where('estado', 'activo')->get()]);
    }

    public function reportes(Request $request)
    {
        $data = Documento::with('user');

        if($request->input('tipo'))
            $data->where('tipo', $request->input('tipo'));

        if($request->input('usuario'))
            $data->where('user_id', $request->input('usuario'));

        if($request->input('date_from') && $request->input('date_to'))
            $data->whereBetween('fecha', [$request->input('date_from'),$request->input('date_to')]);

        if ($request->input('cliente') != "")
            $data->where('cliente_id', $request->input('cliente'));

        return view('documento-reportes')->with(['data' => $data->get(), 'users' => User::all(), 'clientes' => Cliente::where('estado', 'activo')->get()]);
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
            'cliente_id' => NULL,
        ];
        return view('documento')->with(['documento' => $documento, 'id' => NULL, 'clientes' => Cliente::where('estado', 'activo')->get()]);
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
        $documento->cliente_id = $request->input('cliente');
        $documento->user_id = auth()->user()->id;
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
        return view('documento')->with(['documento' => $documento, 'id' => '/'.$id, 'path' => $path, 'clientes' => Cliente::where('estado', 'activo')->get()]);
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
        $documento->cliente_id = $request->input('cliente');

        if($request->hasFile('archivo'))
            $documento->archivo = $request->file('archivo')->store('public');

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
