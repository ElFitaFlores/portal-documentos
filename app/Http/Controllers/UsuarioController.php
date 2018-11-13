<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.w
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuario-list')->with(['data' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = (object) [
            'name' => NULL,
            'email' => NULL,
            'password' => NULL,
            'type' => 'usuario',
        ];
        return view('usuario')->with(['usuario' => $usuario, 'id' => NULL]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = str_replace(' ', '', $request->input('email'));
        $user->type = $request->input('type');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        return redirect('usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('usuario')->with(['usuario' => User::find($id), 'id' => '/'.$id]);
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
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = str_replace(' ', '', $request->input('email'));
        $user->type = $request->input('type');

        if($request->input('password') != '')
            $user->password = Hash::make($request->input('password'));

        $user->save();

        return redirect('usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('usuarios');
    }
}
