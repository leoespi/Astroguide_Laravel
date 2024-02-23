<?php

namespace App\Http\Controllers\API;



use Illuminate\Http\Request;
use App\Models\Quiz; // Importa el modelo Quiz
use App\Models\QuizLogro; // Importa el modelo Quiz
use App\Models\Logros;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class QuizApiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $logros = DB::table('logro_user')->where('user_id', $user->id)->pluck('logro_id')
        ->all();
        /*$logros_ = Logros::where('user_id', $user->id)->pluck('id')
        ->all();*/
        //return response()->json($logros, 200);

        
        $quizlogros = QuizLogro::whereIn('logro_id', $logros)->pluck('quiz_id')
        ->all();;
        $quizs =  Quiz::whereNotIn('id', $quizlogros)->get();
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

    public function show($id)
    {
        $quizs = Quiz::find($id);
        return response()->json($quizs, 200);
    }

    public function destroy($id)
    {
        $quizs = Quiz::find($id);
        $quizs ->delete();
        return response()->json($quizs);
        
    }

    public function validarTerminacion(Request $request)
    {
    // Traer el id del quiz y la respuesta del usuario
    $quizId = $request->input('quiz_id');
    $respuestasClientes = $request->input('respuestas_clientes');
    // BUSCAR QUIZ
    $quiz = Quiz::find($quizId);
    $respuestasCorrectas = [$quiz->RespuestaCorrecta,
                             $quiz->RespuestaCorrecta2,
                              $quiz->RespuestaCorrecta3];

    // quiz existe??
    if (!$quiz) {
        return response()->json(['error' => 'El quiz no existe'], 404);
    }
    $quizTerminadoCorrectamente = false;
            if($respuestasCorrectas == $respuestasClientes){
                $quizTerminadoCorrectamente = true;
        
    }
    if ($quizTerminadoCorrectamente) {
        //$logro = $quiz -> logro -> logro;
        $logro = Logros::find($quiz->logro_id);
    $user = Auth::user();
    $logro->users()->syncWithoutDetaching($user->id);
    }  
    
    // Retorna el resultado
    return response()->json(['quiz_terminado_correctamente' => $quizTerminadoCorrectamente]);
    }

    
}


