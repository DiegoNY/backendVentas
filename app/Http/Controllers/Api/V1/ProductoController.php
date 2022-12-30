<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Producto::all()->where('estado', 1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $producto = new Producto;
        $producto->descripcion = $request->descripcion;
        $producto->id_laboratorio = $request->id_laboratorio;
        $producto->tipo = $request->tipo;
        $producto->stock = $request->stock;
        $producto->stock_minimo = $request->stock_minimo;
        $producto->precio_compra = $request->precio_compra;
        $producto->venta_sujeta = $request->venta_sujeta;
        $producto->foto_producto = $request->foto_producto;
        $producto->estado = 1;

        $producto->save();

        return response()->json(
            ['message' => 'save'],
            Response::HTTP_ACCEPTED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return $producto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->descripcion = $request->descripcion;
        $producto->id_laboratorio = $request->id_laboratorio;
        $producto->tipo = $request->tipo;
        $producto->stock = $request->stock;
        $producto->stock_minimo = $request->stock_minimo;
        $producto->precio_compra = $request->precio_compra;
        $producto->venta_sujeta = $request->venta_sujeta;
        $producto->foto_producto = $request->foto_producto;

        $producto->save();

        return response()->json(

            ['result' => $producto],
            Response::HTTP_OK
        
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->estado = 0;
        $producto->save();

        return response()->json(

            ['message' => 'Deleted'],
            Response::HTTP_OK

        );
    }
}
