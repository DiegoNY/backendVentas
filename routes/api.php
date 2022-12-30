    <?php

    use App\Http\Controllers\Api\V1\ProveedorController;
    use App\Models\Checkoutbox;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;


    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    /**
     * caja
     */

    Route::apiResource('v1/checkoutbox', App\Http\Controllers\Api\V1\CheckoutboxController::class);

    Route::controller(Checkoutbox::class)->group(function () {
        Route::put('v1/checkoutbo/{id}', 'update');
    });

    /**
     * API = GET POST PUT DELETE esto tiene que ir en la cabecera para realizar alguna actualizacion / 
     * 
     * si la peticion es de tipo get sin ningun id devuelve todos los datos
     * si es get y contiene id devuelve ese obj 🍟
     * si es post tiene que traer los datos requeridos especificados en { futura especificacion } para registrar un obj 
     * si es put o patch actualizara el obj 🍔
     * si es delete eliminara el obj este necesita el id si no no funcionara 🐱‍🏍!!
     */

    Route::apiResource('v1/usuario', App\Http\Controllers\Api\V1\UsuarioController::class);


    Route::apiResource('v1/cliente', App\Http\Controllers\Api\V1\ClienteController::class);

    Route::apiResource('v1/producto', App\Http\Controllers\Api\V1\ProductoController::class);

    Route::apiResource('v1/proveedor', App\Http\Controllers\Api\V1\ProveedorController::class);

    Route::apiResource('v1/moneda', App\Http\Controllers\Api\V1\MonedaController::class);

    /**
     * login cotroller
     */

    Route::post('login', [
        App\Http\Controllers\Api\LoginController::class,
        'login'
    ]);
