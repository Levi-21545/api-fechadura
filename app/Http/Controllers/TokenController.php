<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\LogAcesso;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TokenController extends Controller
{
    // Cadastrar
    public function store(Request $request): JsonResponse
    {
        $token = Token::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Token cadastrado com sucesso.',
            'data' => $token
        ], 201);
    }

    // Validar
    public function validate(Request $request): JsonResponse
    {
        $token = Token::where('token', $request->token)->first();

        $status = ($token) ? 'autorizado' : 'negado';

        //Cria um Log
        LogAcesso::create([
            'token' => $request->token,
            'status' => $status,
            'ip_address' => $request->ip(),
        ]);

        if ($token) {
            return response()->json([
                'success' => true,
                'message' => 'Token validado com sucesso.'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Token nao encontrado.'
        ], 404);
    }

    // Deletar
    public function destroy(Request $request): JsonResponse
    {
        $deleted = Token::where('token', $request->token)->delete();

        if ($deleted) {
            return response()->json([
                'success' => true,
                'message' => 'Token deletado com sucesso.'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Token nao encontrado ou ja deletado.'
        ], 404);
    }
}
