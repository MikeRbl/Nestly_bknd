<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
 // Metodo para iniciar sesión
 public function login(Request $request)
 {
     $request->validate([
         'email' => 'required|string|email',
         'password' => 'required|string',
     ]);

     if (!Auth::attempt($request->only('email', 'password'))) {
         return response()->json(['message' => 'Unauthorized'], 401);
     }

     $user = Auth::user();
     $token = $user->createToken('auth_token')->plainTextToken;

     return response()->json([
         'access_token' => $token,
         'token_type' => 'Bearer',
     ]);
 }

 // Metodo para registrar un nuevo usuario
 public function register(Request $request)
 {
     $request->validate([
         'name' => 'required|string|max:255',
         'email' => 'required|string|email|max:255|unique:users',
         'password' => 'required|string|min:6',
     ]);

     $user = User::create([
         'name' => $request->name,
         'email' => $request->email,
         'password' => Hash::make($request->password),
     ]);

     $token = $user->createToken('auth_token')->plainTextToken;

     return response()->json([
         'message' => 'Usuario registrado correctamente',
         'access_token' => $token,
         'token_type' => 'Bearer',
     ]);
 }

 // Obtener usuario autenticado
 public function me(Request $request)
 {
     return response()->json($request->user());
 }

 // Cerrar sesion (Revocar token)
 public function logout(Request $request)
 {
     $request->user()->tokens()->delete();
     return response()->json(['message' => 'Sesión cerrada correctamente']);
 }
}
