<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $proveedor = Proveedor::where('estado', 1)->get()->toArray();
        return response()->json($proveedor);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $proveedor = new Proveedor;
        $proveedor->ruc = $request->ruc;
        $proveedor->nombre = $request->nombre;
        $proveedor->abreviatura = $request->abreviatura;
        $proveedor->telefono = $request->telefono;
        $proveedor->direccion = $request->direccion;
        $proveedor->correo = $request->correo;
        $proveedor->estado = 1;

        $proveedor->save();

        return response()->json(

            ['message' => 'save'],
            Response::HTTP_ACCEPTED

        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        return $proveedor;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $proveedor->ruc = $request->ruc;
        $proveedor->nombre = $request->nombre;
        $proveedor->abreviatura = $request->abreviatura;
        $proveedor->telefono = $request->telefono;
        $proveedor->direccion = $request->direccion;
        $proveedor->correo = $request->correo;

        $proveedor->save();

        return response()->json(
        
            ['result' => $proveedor],
            Response::HTTP_OK
        
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->estado = 0;
        $proveedor->save();

        return response()->json(

            ['message' => 'Deleted'],
            Response::HTTP_OK

        );
    }
}
