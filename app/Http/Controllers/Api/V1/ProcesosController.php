<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProcesosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $PETICION = $request->peticion;
        $descripcion = $request->descripcion;
        $RUC = $request->ruc;
        $DNI = $request->dni;

        $RESPUESTA = ['Sin peticiones'];
        $RESPUESTA_CONSULTA = "";

        switch ($PETICION) {

            case 'SUNAT':

                if ($descripcion == 'RUC')

                    $RESPUESTA_CONSULTA =  $this->consultaRucSunat($RUC);
                    $RESPUESTA =  $RESPUESTA_CONSULTA;

                if ($descripcion == 'DNI')

                    $RESPUESTA_CONSULTA = $this->consultaDniSunat($DNI);
                    $RESPUESTA =  $RESPUESTA_CONSULTA ;

                break;

            case 'IP':

                function getRealIP()
                {
                    if (!empty($_SERVER['HTTP_CLIENT_IP']))
                        return $_SERVER['HTTP_CLIENT_IP'];
                    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) return $_SERVER['HTTP_X_FORWARDED_FOR'];
                    return $_SERVER['REMOTE_ADDR'];
                }


                $res  = getRealIP();

                break;

            default:
                # code...
                break;
        }

        return ["Response" => $RESPUESTA];
    }


    /**
     * Consultas
     */
    public function consultaRucSunat($ruc)
    {
        // Datos
        $token = 'apis-token-1.aTSI1U7KEuT-6bbbCguH-4Y8TI6KS73N';

        // Iniciar llamada a API
        $curl = curl_init();

        // Buscar ruc sunat
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.apis.net.pe/v1/ruc?numero=' . $ruc,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Referer: http://apis.net.pe/api-ruc',
                'Authorization: Bearer ' . $token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // Datos de empresas según padron reducido
        $empresa = json_decode($response);
        //var_dump($empresa);
        return $empresa;
    }
    public function consultaDniSunat($dni)
    {
        // Datos
        $token = 'apis-token-1.aTSI1U7KEuT-6bbbCguH-4Y8TI6KS73N';

        // Iniciar llamada a API
        $curl = curl_init();

        // Buscar ruc sunat
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.apis.net.pe/v1/dni?numero=' . $dni,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Referer: http://apis.net.pe/api-ruc',
                'Authorization: Bearer ' . $token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // Datos de empresas según padron reducido
        $empresa = json_decode($response);
        //var_dump($empresa);
        return $empresa;
    }
}
