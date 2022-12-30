<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Checkoutbox;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class CheckoutboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Checkoutbox::all()->where('estado', 1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkoutbox = new Checkoutbox;
        $checkoutbox->point = $request->point;
        $checkoutbox->money = $request->money;
        $checkoutbox->user =  $request->user;
        $checkoutbox->dni =  $request->dni;
        $checkoutbox->estado = 1;
        $checkoutbox->save();

        return response()->json(

            ['message', 'save'],
            Response::HTTP_ACCEPTED

        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkoutbox  $checkoutbox
     * @return \Illuminate\Http\Response
     */
    public function show(Checkoutbox $checkoutbox)
    {
        return $checkoutbox;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkoutbox  $checkoutbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkoutbox $checkoutbox)
    {
    
        $checkoutbox->point = $request->point;
        $checkoutbox->money = $request->money;
        $checkoutbox->user =  $request->user;
        $checkoutbox->dni =  $request->dni;

        $checkoutbox->save();

        return response()->json(

            ['result' => $checkoutbox],
            Response::HTTP_OK

        );
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkoutbox  $checkoutbox
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkoutbox $checkoutbox)
    {
        $checkoutbox->estado = 0;
        $checkoutbox->save();

        return response()->json(

            ['message' => 'Deleted'],
            Response::HTTP_OK

        );
    }
}
