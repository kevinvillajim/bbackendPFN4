<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class Apicontroller extends Controller
{
    //regiuster api post formdata
    public function register(Request $request)
    {
        //Data Validate
        $request->validate([
            'email' => 'required|email|unique:usuarios',
            'password' => 'required',
        ]);


        //Data Save
        Usuarios::create([
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        //Response
        return response()->json([
            "status" => true,
            "message" => "Registro exitoso",
            "bitacora_message" => "Nuevo usuario registrado: " . $request->email,
        ]);
    }

    public function login(Request $request)
    {
        //Data validate
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        //JSTAuth and attempt
        $token = JWTAuth::attempt([
            "email" => $request->email,
            "password" => $request->password,
        ]);

        //Response
        if (!empty($token)) {
            return response()->json([
                "status" => true,
                "message" => "Login exitoso",
                "token" => $token,
                "id" => auth()->user()->id,
                "bitacora_message" => "Usuario inició sesión: " . $request->email,
            ]);
        }

        return response()->json([
            "status" => false,
            "message" => "Credenciales incorrectas",
            "bitacora_message" => "Intento de inicio de sesión fallido para el usuario: " . $request->email,
        ]);
    }
    public function profile()
    {
        $userData = auth()->user();
        return response()->json([
            "status" => true,
            "message" => "Perfil de usuario",
            "data" => $userData,
            "bitacora_message" => "Se ha consultado el perfil del usuario: "
        ]);
    }

    public function allUsers()
    {
        $all = Usuarios::all();
        return response()->json([
            "status" => true,
            "message" => "Lista de usuarios",
            "data" => $all,
            "bitacora_message" => "Se ha consultado la lista de usuarios",
        ]);
    }

    public function refreshToken()
    {
        $newToken = auth()->refresh();
        return response()->json([
            "status" => true,
            "message" => "Token actualizado",
            "token" => $newToken,
            "bitacora_message" => "Se ha actualizado el token"
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json([
            "status" => true,
            "message" => "Sesión cerrada correctamente",
            "bitacora_message" => "Se ha cerrado sesión"
        ]);
    }
}