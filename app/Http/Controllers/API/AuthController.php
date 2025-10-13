<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
   
   
   public function register(Request $request)
    {
        // Validacion de los datos del usuario
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Creacion del usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Creacion del token de autenticacion
        $token = $user->createToken('auth_token')->plainTextToken;

        // Respuesta con el usuario y el token
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ],201);
    }

    public function login(Request $request)
    {
        // Validacion de los datos del usuario
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Verificacion de las credenciales del usuario
        if (!auth()->attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Credenciales invalidas'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        // Creacion del token de autenticacion
        $token = $user->createToken('auth_token')->plainTextToken;

        // Respuesta con el usuario y el token
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }
} 

