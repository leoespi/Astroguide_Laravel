<?php

namespace App\Http\Controllers\API;

use App\Models\Foro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ForoApiController extends Controller
{
    //Obtener los post 
    public function index()
    {
        $foros = Foro::with('usuario') 
                      ->orderBy('fecha', 'desc')
                      ->orderBy('hora_publicacion', 'desc')
                      ->get();

        return response()->json($foros, 200);
    }
//Crear post :D
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comentarios' => 'required',
            'codigo_publicacion' => 'required',
            'fecha_publicacion' => 'required|date',
            'hora_publicacion' => 'required|date_format:H:i',
            'user_id' => 'required|exists:users,id' 
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $foros = Foro::create([
            'comentarios' => $request->comentarios,
            'codigo_publicacion' => $request->codigo_publicacion,
            'fecha' => $request->fecha_publicacion,
            'hora_publicacion' => $request->hora_publicacion,
            'user_id' => $request->user_id
        ]);

        return response()->json($foros, 201);
    }

    public function show($id)
    {
        $foros = Foro::with('usuario')->find($id);

        if (!$foros) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        return response()->json($foros);
    }
//Actualiacion del post
    public function update(Request $request, $id)
    {
        $foros = Foro::find($id);

        if (!$foros) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'comentarios' => 'required',
            'codigo_publicacion' => 'required',
            'fecha' => 'required|date',
            'hora_publicacion' => 'required|date_format:H:i',
            'user_id' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $foros->update($request->all());

        return response()->json($foros, 200);
    }

    // Eliminar el post 
    public function destroy($id)
    {
        $foros = Foro::find($id);

        if (!$foros) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $foros->delete();

        return response()->json(['message' => 'Post deleted'], 200);
    }
}