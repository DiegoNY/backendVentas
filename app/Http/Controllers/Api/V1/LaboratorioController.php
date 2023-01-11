<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Laboratorio;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class LaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laboratorio = Laboratorio::where('estado', 1)->get()->toArray();
        return response()->json($laboratorio);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $laboratorio = new Laboratorio;
        $laboratorio->ruc = $request->ruc;
        $laboratorio->nombre = $request->nombre;
        $laboratorio->abreviatura = $request->abreviatura;
        $laboratorio->telefono = $request->telefono;
        $laboratorio->direccion = $request->direccion;
        $laboratorio->correo = $request->correo;
        $laboratorio->estado = 1;

        $laboratorio->save();

        return response()->json(

            ['message' => 'save'],
            Response::HTTP_ACCEPTED

        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratorio $laboratorio)
    {
        return $laboratorio;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laboratorio $laboratorio)
    {
        $laboratorio->ruc = $request->ruc;
        $laboratorio->nombre = $request->nombre;
        $laboratorio->abreviatura = $request->abreviatura;
        $laboratorio->telefono = $request->telefono;
        $laboratorio->direccion = $request->direccion;
        $laboratorio->correo = $request->correo;

        $laboratorio->save();

        return response()->json(

            ['result' => $laboratorio],
            Response::HTTP_OK

        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratorio $laboratorio)
    {
        $laboratorio->estado = 0;
        $laboratorio->save();

        return response()->json(

            ['message' => 'Deleted'],
            Response::HTTP_OK

        );
    }
}
