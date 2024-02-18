<?php

namespace App\Http\Controllers\API;



use Illuminate\Http\Request;
use App\Models\Quiz; // Importa el modelo Quiz
use App\Http\Controllers\Controller;


class QuizApiController extends Controller
{
    public function index()
    {
        $quizs =  Quiz::all();
        return response()->json($quizs, 200);
    }

    

    public function store(Request $request)
    {
        $quizs = new Quiz();
        $quizs->Titulo= $request->Titulo;
        $quizs->Duracion= $request->Duracion;
        $quizs->Pregunta= $request->Pregunta;
        $quizs->Respuesta1= $request->Respuesta1;
        $quizs->Respuesta2= $request->Respuesta2;
        $quizs->Respuesta3= $request->Respuesta3;
        $quizs->Respuesta4= $request->Respuesta4;
        $quizs->save();
        return response()->json($quizs, 200);
        //return redirect()->route('quizs.index');
    }


    public function update(Request $request, $id){
        $quizs = Quiz::find($id);
        $quizs->Duracion= $request->Duracion;
        $quizs->Pregunta= $request->Pregunta;
        $quizs->Respuesta1= $request->Respuesta1;
        $quizs->Respuesta2= $request->Respuesta2;
        $quizs->Respuesta3= $request->Respuesta3;
        $quizs->Respuesta4= $request->Respuesta4;
        $quizs->save();
        return response()->json($user);
        

    }

    public function destroy($id)
    {
        $quizs = Quiz::find($id);
        $quizs ->delete();
        return response()->json($quizs);
        
    }

    public function validarQuizterminado(Request $request)
{
    // Obtener el ID del quiz y la respuesta del cliente
    $quizId = $request->input('quiz_id');
    $respuestaCliente = $request->input('respuesta_cliente');

    // Buscar el quiz por su ID
    $quiz = Quiz::find($quizId);

    // Verificar si el quiz existe
    if (!$quiz) {
        return response()->json(['error' => 'El quiz no existe'], 404);
    }

    $respuestasCorrectas = [
        $quiz->RespuestaCorrecta,
        $quiz->RespuestaCorrecta2, 
        $quiz->RespuestaCorrecta3
    ];

    $quizTerminadoCorrectamente = true;
    foreach ($respuestasCliente as $respuestaCliente) {
        if (!in_array($respuestaCliente, $respuestasCorrectas)) {
            $quizTerminadoCorrectamente = false;
            break; // Si una respuesta del cliente no es correcta, el quiz no está terminado correctamente
        }
    }

    return response()->json(['quiz_terminado_correctamente' => $quizTerminadoCorrectamente]);
}

}
