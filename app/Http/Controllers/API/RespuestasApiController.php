<?php

namespace App\Http\Controllers\API;

use App\Models\Respuestas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RespuestasApiController extends Controller
{
    // Obtener todas las respuestas de un foro específico
    public function hola($foroId)
    {
        $respuestas = Respuestas::where('foro_id', $foroId)->get();
        return response()->json($respuestas, 200);
    }

    // Crear una nueva respuesta para un foro
    public function store(Request $request, $foroId)
    {
        $validator = Validator::make($request->all(), [
            'contenido' => 'required|string|max:1000',
            'fecha' => 'required|date',
            'comentarios' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $respuesta = Respuestas::create([
            'contenido' => $request->contenido,
            'fecha' => $request->fecha,
            'comentarios' => $request->comentarios,
            'foro_id' => $foroId,
        ]);

        return response()->json($respuesta, 201);
    }
}
