<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoDocumento = TipoDocumento::where('estatus', 1)->get()->toArray();
        return response()->json($tipoDocumento);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tipoDocumento = new TipoDocumento;
        $tipoDocumento->nombre = $request->nombre;
        $tipoDocumento->serie = $request->serie;
        $tipoDocumento->descripcion_caja = $request->descripcion_caja;
        $tipoDocumento->ip_mask = $request->ip_mask;
        $tipoDocumento->estado = $request->estado;
        $tipoDocumento->estatus = 1;

        $tipoDocumento->save();

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
    public function show(TipoDocumento $tipoDocumento)
    {
        return $tipoDocumento;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoDocumento $tipoDocumento)
    {
        $tipoDocumento->nombre = $request->nombre;
        $tipoDocumento->serie = $request->serie;
        $tipoDocumento->descripcion_caja = $request->descripcion_caja;
        $tipoDocumento->ip_mask = $request->ip_mask;
        $tipoDocumento->estado = $request->estado;
        $tipoDocumento->save();

        return response()->json(

            ['result' => $tipoDocumento],
            Response::HTTP_OK

        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoDocumento $tipoDocumento)
    {
        $tipoDocumento->estado = 0;
        $tipoDocumento->save();

        return response()->json(

            ['message' => 'Deleted'],
            Response::HTTP_OK

        );
    }
}
