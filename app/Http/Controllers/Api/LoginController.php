<?php

namespace App\Http\Controllers\Api;




use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\User;


class LoginController extends Controller
{

    
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (Auth::attempt($request->only('email', 'password'))) {
            
            return response()->json([
                'token' => $request->user()->createToken($request->name)->plainTextToken,
                'email' => $request->user()->email,
                'cargo' => $request->user()->position,
                'nombre' => $request->user()->name,
                'dni' => $request->user()->dni,
                'message' => 'Success'
            ]);
        }

        return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }

    public function validateLogin(Request $request)
    {
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required'
        ]);
    }
}
