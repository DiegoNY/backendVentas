<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Usuario::all()->where('estado', 1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $usuario = new Usuario;

        $usuario->dni = $request->dni;
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->telefono = $request->telefono;
        $usuario->fecha_ingreso = $request->fecha_ingreso;
        $usuario->cargo = $request->cargo;
        $usuario->tipo = $request->tipo;
        $usuario->usuario = $request->usuario;
        $usuario->clave = $request->clave;
        $usuario->estado = $request->estado;

        $usuario->save();

        return response()->json(

            ['message' => 'save'],
            Response::HTTP_ACCEPTED

        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        return $usuario;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->dni = $request->dni;
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->telefono = $request->telefono;
        $usuario->fecha_ingreso = $request->fecha_ingreso;
        $usuario->cargo = $request->cargo;
        $usuario->tipo = $request->tipo;
        $usuario->usuario = $request->usuario;
        $usuario->clave = $request->clave;
        $usuario->estado = $request->estado;

        $usuario->save();

        return response()->json(

            ['result' => $usuario],
            Response::HTTP_OK

        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->estado = 0;
        $usuario->save();

        return response()->json(

            ['message' => 'Deleted'],
            Response::HTTP_OK

        );
    }
}
