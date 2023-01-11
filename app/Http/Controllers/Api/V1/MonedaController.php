<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Moneda;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class MonedaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moneda = Moneda::where('estado', 1)->get()->toArray();
        return response()->json($moneda);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $moneda = new Moneda;
        $moneda->nombre = $request->nombre;
        $moneda->abreviatura = $request->abreviatura;
        $moneda->simbolo = $request->simbolo;
        $moneda->estado = 1;
        $moneda->save();

        return response()->json(

            ['message' => 'save'],
            Response::HTTP_ACCEPTED

        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Moneda  $moneda
     * @return \Illuminate\Http\Response
     */
    public function show(Moneda $moneda)
    {
        return $moneda;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Moneda  $moneda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Moneda $moneda)
    {
        $moneda->nombre = $request->nombre;
        $moneda->abreviatura = $request->abreviatura;
        $moneda->simbolo = $request->simbolo;
        $moneda->save();

        return response()->json(

            ['result' => $moneda],
            Response::HTTP_OK

        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Moneda  $moneda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Moneda $moneda)
    {
        $moneda->estado = 0;
        $moneda->save();

        return response()->json(

            ['message' => 'Deleted'],
            Response::HTTP_OK

        );
    }
}
